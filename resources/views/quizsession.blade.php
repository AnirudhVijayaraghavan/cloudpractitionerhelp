<x-headerfooter>
    <main class="container mx-auto px-6 py-8">
        <!-- Header (Title and Timer) -->
        <header class="flex items-center justify-between border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold">Quiz Simulation</h1>
            <div id="timer" class="text-xl font-bold text-red-600">
                Time Remaining: 60:00
            </div>
        </header>

        <div class="flex flex-col md:flex-row">
            <!-- Left Sidebar: Navigation Panel -->
            <aside class="md:w-1/4 mb-6 md:mb-0 md:mr-4">
                <div class="bg-white rounded-lg shadow p-4">
                    <h2 class="text-lg font-semibold mb-2">Navigation</h2>
                    <div id="navGrid" class="grid grid-cols-4 gap-2">
                        @foreach ($quiz->quizQuestions->sortBy('order') as $index => $quizQuestion)
                            <button type="button"
                                class="nav-btn border rounded py-1 text-sm font-medium focus:outline-none"
                                data-index="{{ $index }}">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                    <p class="mt-2 text-xs text-gray-500">
                        <span class="inline-block w-4 h-4 bg-green-200 mr-1"></span> Bookmarked
                    </p>
                </div>
            </aside>

            <!-- Right Panel: Question Display -->
            <section class="flex-1 bg-white rounded-lg shadow p-6">
                <form id="quizForm" method="POST"
                    action="{{ route('quizsessionstore', ['id' => auth()->user()->id, 'quizID' => $quiz->id]) }}">
                    @csrf
                    @method('PUT')

                    @foreach ($quiz->quizQuestions->sortBy('order') as $index => $quizQuestion)
                        <div class="question-container hidden" data-index="{{ $index }}">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold">
                                    Question {{ $quizQuestion->order }}:
                                </h2>
                                <button type="button" class="bookmark-btn text-blue-600 font-semibold"
                                    data-index="{{ $index }}">
                                    Bookmark
                                </button>
                            </div>
                            <p class="text-gray-700 mb-4">{{ $quizQuestion->question->text }}</p>
                            <div class="space-y-2">
                                @foreach (json_decode($quizQuestion->question->options, true) as $option)
                                    <label class="flex items-center">
                                        <input type="radio" name="answers[{{ $quizQuestion->id }}]"
                                            value="{{ $option }}" class="mr-2">
                                        <span>{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-6 flex justify-between items-center">
                        <button type="button" id="prevBtn"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 focus:outline-none">
                            Previous
                        </button>
                        <button type="button" id="nextBtn"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 focus:outline-none">
                            Next
                        </button>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-semibold">
                            Submit Test
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Place the script in a wire:ignore wrapper so Livewire doesn't re-render it -->
    <div wire:ignore>
        <script>
            // Flag for auto-submission due to time running out.
            let autoSubmitting = false;

            // Variables for question containers and navigation.
            const questionContainers = document.querySelectorAll('.question-container');
            const navBtns = document.querySelectorAll('.nav-btn');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;
            const totalQuestions = questionContainers.length;

            function showQuestion(index) {
                questionContainers.forEach(container => container.classList.add('hidden'));
                document.querySelector(`.question-container[data-index="${index}"]`).classList.remove('hidden');

                navBtns.forEach(btn => btn.classList.remove('bg-blue-600', 'text-white'));
                document.querySelector(`.nav-btn[data-index="${index}"]`).classList.add('bg-blue-600', 'text-white');
            }
            showQuestion(currentIndex);

            // Replace confirm() with SweetAlert2 modal for the previous button.
            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    showQuestion(currentIndex);
                } else {
                    Swal.fire({
                        title: 'Confirm Exit',
                        text: 'This is the first question. Do you really want to exit?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, exit',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('quizForm').submit();
                        }
                    });
                }
            });

            // Replace confirm() with SweetAlert2 modal for the next button.
            nextBtn.addEventListener('click', () => {
                if (currentIndex < totalQuestions - 1) {
                    currentIndex++;
                    showQuestion(currentIndex);
                } else {
                    Swal.fire({
                        title: 'Review or Submit',
                        text: 'This is the last question. Do you want to review your answers or submit the test?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Review',
                        cancelButtonText: 'Submit'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        } else {
                            document.getElementById('quizForm').submit();
                        }
                    });
                }
            });

            navBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    currentIndex = parseInt(this.getAttribute('data-index'));
                    showQuestion(currentIndex);
                });
            });

            const bookmarkBtns = document.querySelectorAll('.bookmark-btn');
            bookmarkBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    const navButton = document.querySelector(`.nav-btn[data-index="${index}"]`);
                    navButton.classList.toggle('bg-green-200');
                });
            });

            // Store the submit event handler in a variable so it can be removed later.
            const formElement = document.getElementById('quizForm');
            const submitHandler = function(e) {
                if (autoSubmitting) return;

                let answeredCount = 0;
                questionContainers.forEach(container => {
                    const radios = container.querySelectorAll('input[type="radio"]');
                    let answered = Array.from(radios).some(radio => radio.checked);
                    if (answered) {
                        answeredCount++;
                    }
                });

                if (answeredCount === 0) {
                    Swal.fire({
                        title: 'No Answers Selected',
                        text: "You haven't answered any questions. Please select at least one answer before submitting.",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    });
                    e.preventDefault();
                    return;
                }

                if (answeredCount < totalQuestions) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Incomplete Answers',
                        text: "You haven't answered all questions. Are you sure you want to submit?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Submit',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            formElement.removeEventListener('submit', submitHandler);
                            formElement.submit();
                        }
                    });
                }
            };
            formElement.addEventListener('submit', submitHandler);

            // Timer: 60 minutes countdown (for testing, set to 10 seconds here).
            let totalTime = 30; // seconds (adjust as needed for production)
            const timerDiv = document.getElementById('timer');
            const timerInterval = setInterval(() => {
                if (totalTime <= 0) {
                    autoSubmitting = true;
                    // Append a hidden input to mark auto submission.
                    const hiddenInput = document.createElement("input");
                    hiddenInput.setAttribute("type", "hidden");
                    hiddenInput.setAttribute("name", "auto_submit");
                    hiddenInput.setAttribute("value", "1");
                    formElement.appendChild(hiddenInput);

                    Swal.fire({
                        title: 'Time is Up!',
                        text: 'Your test will be submitted automatically.',
                        icon: 'info',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(() => {
                        formElement.removeEventListener('submit', submitHandler);
                        formElement.submit();
                    });
                    clearInterval(timerInterval);
                } else {
                    totalTime--;
                    const minutes = Math.floor(totalTime / 60);
                    const seconds = totalTime % 60;
                    timerDiv.textContent = `Time Remaining: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                }
            }, 1000);

            // Additional safeguard for submission.
            formElement.addEventListener('submit', function(e) {
                if (autoSubmitting) return;
            });
        </script>
    </div>
</x-headerfooter>
