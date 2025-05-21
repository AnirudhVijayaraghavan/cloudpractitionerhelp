// loadtest_max_throughput.js
import http from 'k6/http';
import { check } from 'k6';

export let options = {
  scenarios: {
    max_throughput: {
      executor: 'ramping-arrival-rate',
      startRate: 100,      // start at 100 requests/sec
      timeUnit: '1s',
      preAllocatedVUs: 200,  // initial pool of VUs
      maxVUs: 2000,          // up to 2 000 VUs if needed
      stages: [
        { target: 50, duration: '1m' },   // ramp to 200 req/s
        { target: 70, duration: '1m' },   // ramp to 400 req/s
        { target: 100, duration: '1m' },   // ramp to 1 600 req/s
        { target: 140, duration: '1m' },   // ramp to 2 000 req/s
        { target: 0, duration: '30s' },  // ramp down
      ],
    },
  },
  thresholds: {
    // Only fail the test if more than 5% of requests fail
    http_req_failed: ['rate<0.05'],
  },
};

export default function () {
  const res = http.get('https://lms.anirudhvijay.xyz/');
  check(res, {
    'status was 200': (r) => r.status === 200,
  });
}
