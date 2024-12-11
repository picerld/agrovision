<x-guest-layout>
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex items-end h-32 bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt=""
                    src="https://images.unsplash.com/photo-1527454803819-fd7364ac2c83?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="absolute inset-0 object-cover w-full h-full opacity-50" />

                <div class="hidden lg:relative lg:block lg:p-12">
                    <a class="block text-white" href="#">
                        <span class="sr-only">Home</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" class="shrink size-9" height="1em" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888A5 5 0 0 1 20 13.18V19a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5.82a5 5 0 0 1 .528-2.236L6 8V5a2 2 0 0 1 2-2"></path>
                                <path d="M12 15a2 2 0 1 0 4 0a2 2 0 1 0-4 0m-6 6a2 2 0 0 0 2-2v-5.82a5 5 0 0 0-.528-2.236L6 8m5-1h2"></path>
                            </g>
                        </svg>
                    </a>

                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Sebelas Cipta Mandiri
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                        Platform digital (Agrovision) yang memberikan kemudahan bagi petani untuk mengelola
                        pendistribusian bibit dan pupuk secara digital.
                    </p>
                </div>
            </section>

            <main
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="w-full max-w-md">
                    <!-- Form title -->
                    <div class="flex flex-col items-center">
                        <h2 class="mb-4 text-3xl font-semibold text-gray-800">Login to Agrovision</h2>
                        <p class="text-gray-600">Enter your username below to login to your account.</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST" class="grid grid-cols-6 gap-6 mt-8">
                        @csrf
                        <div class="col-span-6">
                            <label for="Username" class="block text-sm font-medium text-gray-700"> Username </label>

                            <input type="text" id="Username" name="username" placeholder="agrovision"
                                class="w-full mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>

                            <input type="password" id="Password" name="password" placeholder="*******"
                                class="w-full mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- <div class="col-span-6">
                            <label for="MarketingAccept" class="flex gap-4">
                                <input type="checkbox" id="MarketingAccept" name="marketing_accept"
                                    class="bg-white border-gray-200 rounded-md shadow-sm size-5" />
    
                                <span class="text-sm text-gray-700">
                                    I want to receive emails about events, product updates and company announcements.
                                </span>
                            </label>
                        </div> --}}

                        <div class="col-span-6">
                            <p class="text-sm text-gray-500">
                                By logging in, you agree to our
                                <a href="#" class="text-gray-700 underline"> terms and conditions </a>
                                and
                                <a href="#" class="text-gray-700 underline">privacy policy</a>.
                            </p>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button
                                class="w-full text-sm font-medium text-white normal-case bg-black rounded-lg shadow-md btn hover:bg-gray-800 btn-lg">
                                Sign in with Username
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-guest-layout>
