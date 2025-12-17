@extends('layouts.app')

@section('title', 'Manajemen Program Siaran')

@section('content')
    <div class="siaran-management p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h2>Manajemen Program Siaran</h2>
                <p class="mb-0">Kelola program siaran radio dan jadwal harian</p>
            </div>
            <div>
                <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#tambahProgramModal">
                    <i class="fas fa-plus me-2"></i>Buat Program
                </button>
                <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#tambahJadwalModal">
                    <i class="fas fa-plus me-2"></i>Buat Jadwal
                </button>
            </div>
        </div>

        <div class="tab-wrapper">
            <button class="tab-btn active" data-tab="program">Daftar Program</button>
            <button class="tab-btn" data-tab="jadwal">Jadwal Hari Ini</button>
        </div>

        <div class="tab-content active" id="program">
            <div class="program-header">
                <i class="far fa-list-alt"></i>
                <span>Daftar Program Siaran</span>
            </div>
            <div class="program-card card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title mb-0">Berita Pagi RSPD</h5>
                        <div>
                            <span class="badge bg-primary text-white">Infrastruktur</span>
                        </div>
                    </div>
                    <p class="card-text">
                        Berita terkini pemerintah daerah dan informasi publik seputar Klaten.
                    </p>
                    <div class="program-meta d-flex align-items-center mt-3">
                        <span class="me-3"><i class="far fa-clock me-1"></i>06:00 - 07:00</span>
                    </div>
                    <div class="action-buttons mt-3 d-flex gap-2">
                        <button class="btn btn-outline-light btn-sm">
                            <i class="far fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-danger text-white btn-sm">
                            <i class="far fa-trash-alt me-1"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="jadwal">
            <div class="jadwal-header">
                <i class="far fa-calendar-alt"></i>
                <span>Jadwal Siaran Hari Ini</span>
            </div>

            <div class="jadwal-container">
                <div class="jadwal-item">
                    <div class="jadwal-content gap-3">
                        <span class="jam">06:00</span>
                        <div class="info">
                            <h4>Berita Pagi RSPD</h4>
                            <small>Presenter: Doni Saputra</small>
                        </div>
                    </div>
                    <div class="jadwal-action-buttons mt-3 d-flex gap-2">
                        <button class="btn btn-outline-light btn-sm">
                            <i class="far fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-danger text-white btn-sm">
                            <i class="far fa-trash-alt me-1"></i>Hapus
                        </button>
                    </div>
                </div>

                <div class="jadwal-item">
                    <div class="jadwal-content gap-3">
                        <span class="jam">07:00</span>
                        <div class="info">
                            <h4>Musik Pagi</h4>
                            <small>Presenter: Auto Playlist</small>
                        </div>
                    </div>
                    <div class="jadwal-action-buttons mt-3 d-flex gap-2">
                        <button class="btn btn-outline-light btn-sm">
                            <i class="far fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-danger text-white btn-sm">
                            <i class="far fa-trash-alt me-1"></i>Hapus
                        </button>
                    </div>
                </div>

                <div class="jadwal-item">
                    <div class="jadwal-content gap-3">
                        <span class="jam">09:00</span>
                        <div class="info">
                            <h4>Musik Hits</h4>
                            <small>Presenter: Auto Playlist</small>
                        </div>
                    </div>
                    <div class="jadwal-action-buttons mt-3 d-flex gap-2">
                        <button class="btn btn-outline-light btn-sm">
                            <i class="far fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-danger text-white btn-sm">
                            <i class="far fa-trash-alt me-1"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/manajemen-siaran.css') }}">
@endpush

@push('scripts')
    <script>
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                btn.classList.add('active');
                document.getElementById(btn.dataset.tab).classList.add('active');
            });
        });
    </script>
@endpush
