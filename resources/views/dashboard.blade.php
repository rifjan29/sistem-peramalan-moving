<x-app-layout>
    @push('js')
        <script>
            // monitoring kunjungan pasien
            var options = {
                series: [{
                    name: 'Online',
                    data: @json($nominal_pemasukan)
                }, {
                name: 'Offline',
                    data:@json($nominal_pengeluaran)
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'date',
                        categories:
                            @json($bulan)

                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#kunjungan"), options);
            chart.render();
        </script>
    @endpush
    <div class="p-4 sm:ml-64 pt-20 h-screen">
        <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-2 w-full mt-4">
            <div class="card p-5 w-full border bg-white h-[127px] relative">
                <div class="flex gap-5">
                    <div>
                        <button class="w-20 h-20 p-5 rounded-full bg-[#9334EA]/20 flex align-middle items-center content-center mx-auto">
                            <svg class="text-3xl mt-1 text-[#9334EA] items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                              </svg>
                        </button>
                    </div>
                    <div class="mt-3">
                        <h2 class="text-theme-text text-3xl font-bold tracking-tighter">
                            Rp. {{ number_format($pemasukan,2, ",", ".") }}
                        </h2>
                        <p class="text-gray-500 text-sm tracking-tighter">
                            Total Pemasukan
                        </p>
                    </div>
                    {{-- <a href="{{ route('dashboard-detail') }}" class="btn-detail"><iconify-icon icon="solar:document-outline"></iconify-icon> Detail</a> --}}
                </div>
            </div>
            <div class="card p-5 w-full border bg-white h-[127px] relative">
                <div class="flex gap-5 justify-between">
                    <div class="flex gap-5">
                        <div>
                            <button class="w-20 h-20 p-5 rounded-full bg-[#25E76E]/20 flex align-middle items-center content-center mx-auto">
                                <svg class="text-3xl mt-1 text-[#25E76E] items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h2 class="text-theme-text text-3xl font-bold tracking-tighter">
                             Rp. {{ number_format($pengeluaran,2, ",", ".") }}
                            </h2>
                            <p class="text-gray-500 text-sm tracking-tighter">
                                Jumlah Pengeluaran
                            </p>
                        </div>
                    </div>
                    <div>
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Sudah Verifikasi</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="grid lg:grid-cols-1 md:grid-cols-2 grid-cols-1 gap-2 w-full mt-2">
            <div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
                <div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
                    <div class="title">
                        <h2 class="font-semibold tracking-tighter text-lg text-theme-text">
                            Monitoring Presentase Pemasukan dan Pengeluaran
                        </h2>
                    </div>
                </div>
                <hr>
                <div class="lg:mt-0 pt-10 mx-auto">
                    <div id="kunjungan"></div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
