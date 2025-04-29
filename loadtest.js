import http from 'k6/http';
import { check } from 'k6';

export let options = {
    scenarios: {
        high_load: {
            executor: 'constant-arrival-rate', // fire requests at a fixed rate
            rate: 200,                         // 1 000 requests per second
            timeUnit: '1s',                     // per second
            duration: '1m',                     // run for 1 minute
            preAllocatedVUs: 200,               // start with 200 VUs
            maxVUs: 300,                        // scale up to 500 if needed
        },
    },
    thresholds: {
        // Fail the test if 95% of requests take longer than 500 ms
        http_req_duration: ['p(95)<500'],
        // No failed status codes allowed
        http_req_failed: ['rate==0'],
    },
};

export default function () {
    const res = http.get('https://shorty.anirudhvijay.xyz/');
    check(res, { 'status was 200': (r) => r.status === 200 });
}
