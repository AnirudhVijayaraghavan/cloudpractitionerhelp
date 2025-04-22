<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use OpenAI\Laravel\Facades\OpenAI;

class GenerateAwsCcpQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-aws-ccp-questions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch AWS CCP (CLF-C02) questions from OpenAI and seed the questions table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = 5;

        $this->info("Requesting {$count} AWS CCP questions from OpenAI…");

        // 1) Call the OpenAI chat completion endpoint
        $response = OpenAI::chat()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are an AWS exam question writer. Generate JSON array of multiple‑choice questions for the AWS CCP (CLF‑C02) exam.'
                ],
                [
                    'role' => 'user',
                    'content' => <<<PROMPT
Generate {$count} AWS Certified Cloud Practitioner multiple‑choice questions.
- Format as a JSON array of objects with keys: question, options (array of 4 strings), correct_answer (one of "A","B","C","D"), explanation.
- Keep language concise and professional. Important: Return only the JSON array—no markdown, no backticks, no extra commentary.
PROMPT
                ],
            ],
            'temperature' => 0.2,
            'max_tokens' => 2000,
        ]);

        $json = $response->choices[0]->message->content;

        // 2) Decode and validate
        $questions = json_decode($json, true);
        if (!is_array($questions)) {
            $this->error("Failed to decode JSON. Response was:\n{$json}");
            return 1;
        }

        // 3) Insert into DB
        $bar = $this->output->createProgressBar(count($questions));
        $bar->start();

        foreach ($questions as $item) {
            // Basic validation
            if (empty($item['question']) || !isset($item['options'][3]) || empty($item['correct_answer'])) {
                $this->warn("Skipping malformed item: " . json_encode($item));
                continue;
            }

            Question::create([
                'text' => Str::limit($item['question'], 1000),
                'options' => json_encode($item['options']),
                'correct_answer' => $item['correct_answer'],
                'explanation' => $item['explanation'] ?? null,
            ]);

            $bar->advance();
        }

        $bar->finish();
        $this->info("\nDone! Inserted " . Question::count() . " total questions.");

        return 0;
    }
}
