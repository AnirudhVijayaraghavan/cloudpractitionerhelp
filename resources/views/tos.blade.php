<x-headerfooter>
    @section('maintitle', 'Terms of Service')
    <div class="flex-grow container mx-auto px-6 py-12">
        <h1 class="text-3xl font-extrabold mb-4">Terms and Conditions</h1>
        <p class="text-gray-600 mb-8">Last updated: May 31, 2025</p>

        {{-- Acknowledgment --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Acknowledgment</h2>
            <p class="mb-4">
                These Terms and Conditions govern your use of the CloudPractitionerHelp website (“Service”). By
                accessing or
                using the Service, you agree to be bound by these Terms. If you disagree with any part of these Terms,
                you
                may not access or use the Service.
            </p>
            <p class="mb-4">
                When you use our Service, you may create an account by providing only your email address and choosing a
                password, or by signing in via OAuth (e.g., Google). No additional proof of identity is required. You
                may
                also supply a display name, which can be fictitious if you wish. By creating an account, you represent
                that
                you are at least 13 years old. If you are under 13, please do not register or use this Service.
            </p>
            <p class="mb-4">
                Your access to and use of the Service is also governed by our
                <a wire:navigate href="{{ route('privacy') }}" class="text-blue-600 hover:underline">Privacy Policy</a>, which describes
                how
                we collect, use, and disclose your personal information.
            </p>
        </section>

        {{-- Interpretation and Definitions --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Interpretation and Definitions</h2>

            <h3 class="text-xl font-semibold mb-1">Interpretation</h3>
            <p class="mb-4">
                Words with initial capital letters have meanings defined under the following conditions. Definitions
                apply
                whether they appear in singular or plural.
            </p>

            <h3 class="text-xl font-semibold mb-1">Definitions</h3>
            <p class="mb-2">For the purposes of these Terms and Conditions:</p>
            <ul class="list-disc pl-6 space-y-2 mb-4">
                <li>
                    <strong>Account</strong> means a unique account you create to access our Service. We collect only
                    your
                    email address and password (or OAuth credentials via Google), plus an optional display name.
                </li>
                <li>
                    <strong>Affiliate</strong> means an entity that controls, is controlled by, or is under common
                    control
                    with a party (control = >50% ownership of voting shares).
                </li>
                <li>
                    <strong>Company</strong> (also “we,” “us,” or “our”) refers to CloudPractitionerHelp.
                </li>
                <li>
                    <strong>Device</strong> means any device (computer, tablet, smartphone, etc.) used to access the
                    Service.
                </li>
                <li>
                    <strong>Service</strong> refers to the CloudPractitionerHelp website, accessible at
                    <a href="https://www.cloudpractitionerhelp.com" target="_blank"
                        class="text-blue-600 hover:underline">cloudpractitionerhelp.com</a>.
                </li>
                <li>
                    <strong>Terms and Conditions</strong> (also “Terms”) mean this entire agreement between you and the
                    Company regarding your use of the Service.
                </li>
                <li>
                    <strong>Third-party Social Media Service</strong> means any social login provider (e.g., Google)
                    that you
                    use to register or log in.
                </li>
                <li>
                    <strong>You</strong> means the individual or legal entity accessing or using the Service, as
                    applicable.
                </li>
            </ul>
        </section>

        {{-- Links to Other Websites --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Links to Other Websites</h2>
            <p class="mb-4">
                Our Service may contain links to third-party websites or services that are not owned or controlled by
                CloudPractitionerHelp.
                We have no control over—and assume no responsibility for—the content, privacy policies, or practices of
                these
                third-party sites. You acknowledge and agree that CloudPractitionerHelp is not responsible or liable,
                directly
                or indirectly, for any damage or loss caused by or in connection with the use of or reliance on any such
                content,
                goods, or services available on or through any such websites or services.
            </p>
            <p>
                We strongly advise you to read the terms and conditions and privacy policies of any third-party websites
                or
                services you visit.
            </p>
        </section>

        {{-- Termination --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Termination</h2>
            <p class="mb-4">
                We may terminate or suspend your access immediately, without prior notice or liability, for any reason
                whatsoever, including if you breach these Terms. Upon termination, your right to use the Service will
                cease immediately.
            </p>
        </section>

        {{-- Limitation of Liability --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Limitation of Liability</h2>
            <p class="mb-4">
                To the maximum extent permitted by law, in no event shall CloudPractitionerHelp or its affiliates be
                liable
                for any indirect, incidental, special, consequential, or punitive damages, including but not limited to
                loss
                of profits, data, or other intangible losses, arising out of or related to your use of the Service.
            </p>
            <p>
                Our total liability to you for all claims arising from or relating to these Terms or your use of the
                Service
                will not exceed the greater of (a) one hundred U.S. dollars (USD 100) or (b) the amount you paid
                directly
                to us during the twelve months immediately preceding the claim.
            </p>
        </section>

        {{-- “AS IS” and “AS AVAILABLE” Disclaimer --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">&ldquo;AS IS&rdquo; and &ldquo;AS AVAILABLE&rdquo; Disclaimer</h2>
            <p class="mb-4">
                The Service is provided on an “AS IS” and “AS AVAILABLE” basis without any warranties of any kind,
                whether
                express, implied, statutory, or otherwise. We expressly disclaim all warranties, including
                merchantability,
                fitness for a particular purpose, non-infringement, and any warranties that may arise out of course of
                dealing, usage, or trade practice. We do not guarantee that the Service will meet your requirements or
                be
                uninterrupted or error-free.
            </p>
        </section>

        {{-- Governing Law --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Governing Law</h2>
            <p class="mb-4">
                These Terms shall be governed by and construed in accordance with the laws of the United States
                (Massachusetts),
                without regard to its conflict of law provisions.
            </p>
        </section>

        {{-- Dispute Resolution --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Dispute Resolution</h2>
            <p class="mb-4">
                If you have any concerns or disputes about the Service, please contact us first at
                <a href="mailto:anirudh1997@hotmail.com"
                    class="text-blue-600 hover:underline">anirudh1997@hotmail.com</a>.
                We will do our best to resolve any issue informally before resorting to formal legal action.
            </p>
        </section>

        {{-- Children's Access --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Children’s Access</h2>
            <p>
                Our Service is not intended for anyone under the age of 13. We do not knowingly collect personally
                identifiable information from children under 13. If you become aware that a child under 13 has provided
                us with personal data, please contact us and we will take steps to remove that information.
            </p>
        </section>

        {{-- Changes to These Terms --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Changes to These Terms</h2>
            <p class="mb-4">
                We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a
                revision is
                material, we will provide you with at least 30 days’ notice prior to any new terms taking effect, by
                email
                or by posting a notice on our Service. By continuing to access or use the Service after those revisions
                become effective, you agree to be bound by the revised terms. If you do not agree to the new terms,
                please
                stop using the Service.
            </p>
        </section>

        {{-- Contact Us --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">Contact Us</h2>
            <p>
                If you have any questions about these Terms, please contact us:
            </p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li>
                    By email: <a href="mailto:anirudh1997@hotmail.com"
                        class="text-blue-600 hover:underline">anirudh1997@hotmail.com</a>
                </li>
                <li>
                    By visiting this page on our website:
                    <a href="https://www.cloudpractitionerhelp.com/support/create" target="_blank"
                        class="text-blue-600 hover:underline">
                        https://www.cloudpractitionerhelp.com/support/create
                    </a>
                </li>
            </ul>
        </section>
    </div>
</x-headerfooter>
