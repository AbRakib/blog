@extends('backend.layouts.backend')

@section('title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Central Hub for Personal Customization')

@section('toolbar')
    <a class="kt-btn kt-btn-outline" href="{{ route('home') }}">View Profile</a>
@endsection

@push('styles')
    <style>
        .channel-stats-bg {
            background-image: url('{{ asset('dashboard-html/dist/assets/media/images/2600x1600/bg-3.png') }}');
        }

        .entry-callout-bg {
            background-image: url('{{ asset('dashboard-html/dist/assets/media/images/2600x1600/2.png') }}');
        }

        .dark .channel-stats-bg {
            background-image: url('{{ asset('dashboard-html/dist/assets/media/images/2600x1600/bg-3-dark.png') }}');
        }

        .dark .entry-callout-bg {
            background-image: url('{{ asset('dashboard-html/dist/assets/media/images/2600x1600/2-dark.png') }}');
        }
    </style>
@endpush

@section('content')
    <div class="grid gap-5 lg:gap-7.5">
        <div class="grid lg:grid-cols-3 gap-y-5 lg:gap-7.5 items-stretch">
            <div class="lg:col-span-1">
                <div class="grid grid-cols-2 gap-5 lg:gap-7.5 h-full items-stretch">
                    @foreach ([
                        ['logo' => 'linkedin-2.svg', 'value' => '9.3k', 'label' => 'Amazing mates'],
                        ['logo' => 'youtube-2.svg', 'value' => '24k', 'label' => 'Lessons Views'],
                        ['logo' => 'instagram-03.svg', 'value' => '608', 'label' => 'New subscribers'],
                    ] as $stat)
                        <div class="kt-card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                            <img alt="" class="w-7 mt-4 ms-5" src="{{ asset('dashboard-html/dist/assets/media/brand-logos/'.$stat['logo']) }}">
                            <div class="flex flex-col gap-1 pb-4 px-5">
                                <span class="text-3xl font-semibold text-mono">{{ $stat['value'] }}</span>
                                <span class="text-sm font-normal text-secondary-foreground">{{ $stat['label'] }}</span>
                            </div>
                        </div>
                    @endforeach

                    <div class="kt-card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                        <img alt="" class="dark:hidden w-7 mt-4 ms-5" src="{{ asset('dashboard-html/dist/assets/media/brand-logos/tiktok.svg') }}">
                        <img alt="" class="hidden dark:block w-7 mt-4 ms-5" src="{{ asset('dashboard-html/dist/assets/media/brand-logos/tiktok-dark.svg') }}">
                        <div class="flex flex-col gap-1 pb-4 px-5">
                            <span class="text-3xl font-semibold text-mono">2.5k</span>
                            <span class="text-sm font-normal text-secondary-foreground">Stream audience</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="kt-card h-full">
                    <div class="kt-card-content p-10 bg-[length:80%] rtl:[background-position:-70%_25%] [background-position:175%_25%] bg-no-repeat entry-callout-bg">
                        <div class="flex flex-col justify-center gap-4">
                            <div class="flex -space-x-2">
                                @foreach (['300-4.png', '300-1.png', '300-2.png'] as $avatar)
                                    <img alt="" class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-10" src="{{ asset('dashboard-html/dist/assets/media/avatars/'.$avatar) }}">
                                @endforeach
                                <span class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none size-10 text-white text-xs ring-background bg-green-500">
                                    {{ str(auth()->user()->name)->substr(0, 1)->upper() }}
                                </span>
                            </div>
                            <h2 class="text-xl font-semibold text-mono">
                                Connect Today & Join<br>
                                the <a class="kt-link" href="{{ route('home') }}">KeenThemes Network</a>
                            </h2>
                            <p class="text-sm font-normal text-secondary-foreground leading-5.5">
                                Enhance your projects with premium themes and<br>
                                templates. Join the KeenThemes community today<br>
                                for top-quality designs and resources.
                            </p>
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="{{ route('home') }}">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
            <div class="lg:col-span-1">
                <div class="kt-card h-full">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">Highlights</h3>
                        <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost" type="button" aria-label="More options">
                            <i class="ki-filled ki-dots-vertical text-lg" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="kt-card-content flex flex-col gap-4 p-5 lg:p-7.5 lg:pt-4">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-sm font-normal text-secondary-foreground">All time sales</span>
                            <div class="flex items-center gap-2.5">
                                <span class="text-3xl font-semibold text-mono">$295.7k</span>
                                <span class="kt-badge kt-badge-outline kt-badge-success kt-badge-sm">+2.7%</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mb-1.5">
                            <div class="bg-green-500 h-2 w-full max-w-[60%] rounded-xs"></div>
                            <div class="bg-destructive h-2 w-full max-w-[25%] rounded-xs"></div>
                            <div class="bg-violet-500 h-2 w-full max-w-[15%] rounded-xs"></div>
                        </div>
                        <div class="flex items-center flex-wrap gap-4 mb-1">
                            <div class="flex items-center gap-1.5">
                                <span class="rounded-full size-2 kt-badge-success"></span>
                                <span class="text-sm font-normal text-foreground">Metronic</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="rounded-full size-2 kt-badge-destructive"></span>
                                <span class="text-sm font-normal text-foreground">Bundle</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="rounded-full size-2 kt-badge-info"></span>
                                <span class="text-sm font-normal text-foreground">MetronicNest</span>
                            </div>
                        </div>
                        <div class="border-b border-input"></div>
                        <div class="grid gap-3">
                            @foreach ([
                                ['icon' => 'ki-shop', 'label' => 'Online Store', 'value' => '$172k', 'trend' => '3.9%', 'up' => true],
                                ['icon' => 'ki-facebook', 'label' => 'Facebook', 'value' => '$85k', 'trend' => '0.7%', 'up' => false],
                                ['icon' => 'ki-instagram', 'label' => 'Instagram', 'value' => '$36k', 'trend' => '8.2%', 'up' => true],
                            ] as $source)
                                <div class="flex items-center justify-between flex-wrap gap-2">
                                    <div class="flex items-center gap-1.5">
                                        <i class="ki-filled {{ $source['icon'] }} text-base text-muted-foreground" aria-hidden="true"></i>
                                        <span class="text-sm font-normal text-mono">{{ $source['label'] }}</span>
                                    </div>
                                    <div class="flex items-center text-sm font-medium text-foreground gap-6">
                                        <span class="lg:text-right">{{ $source['value'] }}</span>
                                        <span class="lg:text-right">
                                            <i class="ki-filled {{ $source['up'] ? 'ki-arrow-up text-green-500' : 'ki-arrow-down text-destructive' }}" aria-hidden="true"></i>
                                            {{ $source['trend'] }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="kt-card h-full">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">Earnings</h3>
                        <div class="flex flex-wrap items-center gap-5">
                            <label class="flex items-center gap-2">
                                <input class="kt-switch" name="referrals_only" type="checkbox" value="1">
                                <span class="kt-label">Referrals only</span>
                            </label>
                            <select class="kt-select w-36" name="period" aria-label="Select period">
                                <option>Select period</option>
                                <option value="1">1 month</option>
                                <option value="3">3 months</option>
                                <option value="6">6 months</option>
                                <option value="12">12 months</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-card-content flex flex-col justify-end items-stretch grow px-3 py-1">
                        <div id="earnings_chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <section class="kt-card" aria-labelledby="account-heading">
            <div class="kt-card-header">
                <h2 id="account-heading" class="kt-card-title">Your Account</h2>
                <i class="ki-filled ki-profile-circle text-xl text-muted-foreground" aria-hidden="true"></i>
            </div>
            <div class="kt-card-content">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm text-secondary-foreground">Name</dt>
                        <dd class="text-sm font-medium text-mono mt-2 break-all">{{ auth()->user()->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-secondary-foreground">Email</dt>
                        <dd class="text-sm font-medium text-mono mt-2 break-all">{{ auth()->user()->email }}</dd>
                    </div>
                </dl>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const element = document.querySelector('#earnings_chart');

            if (!element || typeof ApexCharts === 'undefined') {
                return;
            }

            const chart = new ApexCharts(element, {
                series: [{
                    name: 'Earnings',
                    data: [75, 25, 45, 15, 85, 35, 70, 25, 35, 15, 45, 30],
                }],
                chart: {
                    height: 250,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: ['var(--color-primary)'],
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    axisBorder: {
                        show: false,
                    },
                    maxTicks: 12,
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        style: {
                            colors: 'var(--color-muted-foreground)',
                            fontSize: '12px',
                        },
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    tickAmount: 5,
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        style: {
                            colors: 'var(--color-muted-foreground)',
                            fontSize: '12px',
                        },
                        formatter: (value) => `$${value}K`,
                    },
                },
                tooltip: {
                    enabled: true,
                    y: {
                        formatter: (value) => `$${value}K`,
                    },
                },
                markers: {
                    size: 0,
                    colors: 'var(--color-primary)',
                    strokeColors: 'var(--color-primary)',
                    strokeWidth: 4,
                    hover: {
                        size: 8,
                    },
                },
                fill: {
                    gradient: {
                        enabled: true,
                        opacityFrom: 0.25,
                        opacityTo: 0,
                    },
                },
                grid: {
                    borderColor: 'var(--color-border)',
                    strokeDashArray: 5,
                    clipMarkers: false,
                    yaxis: {
                        lines: {
                            show: true,
                        },
                    },
                    xaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
            });

            chart.render();
        });
    </script>
@endpush
