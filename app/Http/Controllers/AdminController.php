<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\ObatKeluar;
use App\Models\ObatMasuk;
use App\Models\Tempat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $obat = Obat::count();
        $tujuan = Tempat::all();
        $tempatTujuan = Tempat::count();
        $tujuanPertama = Tempat::all()->first();
        $obatMasuk = ObatMasuk::count();
        $obatKeluar = ObatKeluar::count();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(2),
            'obat' => $obat,
            'obatMasuk' => $obatMasuk,
            'obatKeluar' => $obatKeluar,
            'tujuan' => $tujuan,
            'tujuanPertama' => $tujuanPertama,
            'tempatTujuan' => $tempatTujuan,
            'user' => $user,
        ];
        return view('adminPage/beranda', $data);
    }

    public function dataObat(Request $request)
    {
        $user = Auth::user();
        $tujuan = Tempat::all();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(2),
            'tujuan' => $tujuan,
            'user' => $user,
        ];
        $dataObat = Obat::all(); // Fetch all data obat
        return view('adminPage/dataObat', $data, compact('dataObat'));
    }

    public function simpanDataObat(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        // Generate kode_obat otomatis
        $kodeObat = 'OBAT-' . time(); // Format: OBAT-{timestamp}

        Obat::create([
            'kode_obat' => $kodeObat,
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('admin.dataObat')->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function hapusDataObat($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('admin.dataObat')->with('success', 'Data obat berhasil dihapus!');
    }

    public function tambahDataObat(Request $request)
    {
        $tujuan = Tempat::all();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'tujuan' => $tujuan,
            'user' => $user,
        ];
        return view('adminPage/tambahDataObat', $data);
    }

    public function editDataObat(Request $request, $id)
    {
        $tujuan = Tempat::all();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'tujuan' => $tujuan,
            'user' => $user,
        ];

        $obat = Obat::findOrFail($id);

        return view('adminPage/editDataObat', $data, compact('obat'));
    }


    public function updateDataObat(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('admin.dataObat')->with('success', 'Data obat berhasil diperbarui!');
    }


    public function dataObatMasuk(Request $request)
    {
        $tujuan = Tempat::all();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(2),
            'tujuan' => $tujuan,
            'user' => $user,
        ];
        $dataObatMasuk = ObatMasuk::all();
        return view('adminPage/dataObatMasuk', $data, compact('dataObatMasuk'));
    }

    public function tambahDataObatMasuk(Request $request)
    {
        $tujuan = Tempat::all();
        $user = Auth::user();
        $dataObatMasuk = Obat::all();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'dataObatMasuk' => $dataObatMasuk,
            'tujuan' => $tujuan,
            'user' => $user,
        ];


        return view('adminPage/tambahDataObatMasuk', $data,);
    }

    public function simpanDataObatMasuk(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'tanggal_obat_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        // Ambil data obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->first();

        // Jika obat tidak ditemukan
        if ($obat) {
            $obat->jumlah += $request->jumlah;  // Tambahkan jumlah obat yang masuk
            $obat->save();

            $kodeObatMasuk = 'OBAT-' . time(); // Format: OBAT-{timestamp}

            // Simpan data obat masuk
            ObatMasuk::create([
                'kode_obat_masuk' => $kodeObatMasuk,
                'kode_obat' => $obat->kode_obat,
                'nama_obat' => $obat->nama_obat,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'tanggal_obat_masuk' => $request->tanggal_obat_masuk,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            ]);
        } else {
            // Jika tidak ada, buat kode obat otomatis
            $kodeObat = 'OBAT-' . time(); // Generate kode obat baru otomatis

            // Tambahkan data ke tabel Obat
            Obat::create([
                'kode_obat' => $kodeObat,
                'nama_obat' => $request->nama_obat,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            ]);

            // Generate kode_obat_masuk otomatis
            $kodeObatMasuk = 'OBAT-' . time(); // Format: OBAT-{timestamp}

            // Simpan data obat masuk
            ObatMasuk::create([
                'kode_obat_masuk' => $kodeObatMasuk,
                'kode_obat' => $kodeObat,
                'nama_obat' => $request->nama_obat,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'tanggal_obat_masuk' => $request->tanggal_obat_masuk,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            ]);
        }

        // Generate kode_obat_masuk otomatis


        // Redirect setelah berhasil menyimpan
        return redirect()->route('admin.data-obat-masuk')->with('success', 'Data obat masuk berhasil ditambahkan!');
    }

    public function hapusDataObatMasuk($id)
    {
        // Temukan data ObatMasuk berdasarkan ID
        $obatMasuk = ObatMasuk::findOrFail($id);


        // Hapus data ObatMasuk
        $obatMasuk->delete();

        return redirect()->route('admin.data-obat-masuk')->with('success', 'Data obat masuk berhasil dihapus!');
    }

    public function editDataObatMasuk(Request $request, $id)
    {
        $tujuan = Tempat::all();
        $dataObatMasuk = Obat::all();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'dataObatMasuk' => $dataObatMasuk,
            'tujuan' => $tujuan,
            'user' => $user,
        ];

        $obatMasuk = ObatMasuk::findOrFail($id);

        return view('adminPage/editDataObatMasuk', $data, compact('obatMasuk'));
    }


    public function updateDataObatMasuk(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_obat' => 'required|string',
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'tanggal_obat_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        // Temukan data obat masuk berdasarkan ID
        $obatMasuk = ObatMasuk::findOrFail($id);

        // Ambil data obat lama sebelum diupdate
        $obatLama = Obat::where('kode_obat', $obatMasuk->kode_obat)->first();

        // Ambil data obat baru yang dipilih
        $obatBaru = Obat::where('kode_obat', $request->kode_obat)->first();

        // Jika kode obat berubah (artinya user mengganti nama obat)
        if ($obatMasuk->kode_obat !== $request->kode_obat) {
            // Kembalikan stok obat lama sebelum perubahan
            if ($obatLama) {
                $obatLama->jumlah -= $obatMasuk->jumlah;
                $obatLama->save();
            }

            // Tambahkan stok ke obat baru
            if ($obatBaru) {
                $obatBaru->jumlah += $request->jumlah;
                $obatBaru->save();
            }
        } else {
            // Jika hanya jumlah yang berubah (tanpa mengganti nama obat)
            if ($obatLama) {
                $selisihJumlah = $request->jumlah - $obatMasuk->jumlah;
                $obatLama->jumlah += $selisihJumlah;
                $obatLama->save();
            }
        }

        // Update data obat masuk
        $obatMasuk->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
            'tanggal_obat_masuk' => $request->tanggal_obat_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('admin.data-obat-masuk')->with('success', 'Data obat masuk berhasil diperbarui!');
    }


    public function persediaan(Request $request)
    {

        $tempat = Tempat::all();
        $tujuan = Tempat::all();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(2),
            'tempat' => $tempat,
            'tujuan' => $tujuan,
            'user' => $user,


        ];
        return view('adminPage/persediaan', $data);
    }

    public function tambahPersediaan(Request $request)
    {
        $tujuan = Tempat::all();
        $user = Auth::user();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'tujuan' => $tujuan,
            'user' => $user,
        ];
        return view('adminPage/tambahPersediaan', $data);
    }

    public function simpanPersediaan(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
        ]);

        Tempat::create([
            'nama_tempat' => $request->nama_tempat,
        ]);

        return redirect()->route('admin.persediaan')->with('success', 'Data Tempat berhasil ditambahkan!');
    }

    public function editPersediaan(Request $request, $id)
    {
        $tujuan = Tempat::all();
        $user = Auth::user();

        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'tujuan' => $tujuan,
            'user' => $user,

        ];

        $tempat = Tempat::findOrFail($id);
        return view('adminPage/editPersediaan', $data, compact('tempat'));
    }

    public function updatePersediaan(Request $request, $id)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
        ]);

        $tempat = Tempat::findOrFail($id);
        $tempat->nama_tempat = $request->nama_tempat;
        $tempat->save();

        return redirect()->route('admin.persediaan')->with('success', 'Data tempat berhasil diperbarui!');
    }

    public function hapusPersediaan($id)
    {
        $tempat = Tempat::findOrFail($id);
        $tempat->delete();

        return redirect()->route('admin.persediaan')->with('success', 'Data tempat berhasil dihapus!');
    }




    public function dataObatKeluar($id)
    {
        // Ambil semua tempat untuk navigasi sidebar
        $tujuan = Tempat::all();

        // Temukan tempat berdasarkan ID
        $tempat = Tempat::findOrFail($id);
        $user = Auth::user();

        $dataObatKeluar = ObatKeluar::where('id_tempat', $id)->get();

        // Siapkan data untuk view
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => true,
            'menuName' => $tempat->nama_tempat, // Nama tempat saat ini
            'tempat' => $tempat,
            'tujuan' => $tujuan,
            'currentLocation' => $tempat->nama_tempat, // Lokasi saat ini
            'dataObatKeluar' => $dataObatKeluar,
            'user' => $user,
        ];

        // Render view dengan data
        return view('adminPage.dataObatKeluar', $data);
    }

    public function tambahDataObatKeluar(Request $request, $id)
    {
        $obatList = Obat::all();
        $user = Auth::user();
        $tempat = Tempat::findOrFail($id);
        $tujuan = Tempat::all();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => true,
            'menuName' => $tempat->nama_tempat, // Nama tempat saat ini
            'tujuan' => $tujuan,
            'currentLocation' => $tempat->nama_tempat,
            'tempat' => $tempat,
            'obatList' => $obatList,
            'user' => $user,
        ];
        return view('adminPage/tambahDataObatKeluar', $data);
    }

    public function simpanDataObatKeluar(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_obat' => 'required|string',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'tanggal_distribusi' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'id_tempat' => 'required|integer|exists:tempats,id',
        ]);

        // Ambil data obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->first();
        $tempat_tujuan = Tempat::find($request->id_tempat);

        if (!$tempat_tujuan) {
            return redirect()->back()->with('error', 'Tempat tujuan tidak ditemukan.');
        }

        if (!$obat) {
            return redirect()->back()->with('error', 'Obat tidak ditemukan.');
        }

        // Cek apakah jumlah yang diminta lebih dari stok yang tersedia
        if ($request->jumlah > $obat->jumlah) {
            return redirect()->back()->with('error', 'Jumlah obat tidak mencukupi!')->withInput();
        }

        // Kurangi stok obat
        $obat->jumlah -= $request->jumlah;
        $obat->save();

        // Generate kode obat keluar
        $kodeObatKeluar = 'OBAT-' . time();

        // Simpan data obat keluar
        ObatKeluar::create([
            'kode_obat_keluar' => $kodeObatKeluar,
            'kode_obat' => $obat->kode_obat,
            'nama_obat' => $obat->nama_obat,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
            'tanggal_distribusi' => $request->tanggal_distribusi,
            'tujuan' => $tempat_tujuan->nama_tempat,
            'id_tempat' => $tempat_tujuan->id,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('admin.data-obat-keluar', $tempat_tujuan->id)->with('success', 'Data obat keluar berhasil ditambahkan!');
    }



    public function editDataObatKeluar(Request $request, $id)
    {
        $tujuanPertama = Tempat::all()->first();
        // Ambil data obat keluar berdasarkan ID
        $obatKeluar = ObatKeluar::with('tempats')->findOrFail($id);

        // Ambil data tempat terkait
        $tempat = $obatKeluar->tempat;

        // Ambil daftar semua tempat dan obat (untuk dropdown, jika diperlukan)
        $tujuan = Tempat::all();
        $obatList = Obat::all();
        $user = Auth::user();

        // Data untuk dikirim ke view
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'obatList' => $obatList,
            'tujuan' => $tujuan,
            'tempat' => $tempat,
            'user' => $user,
            'tujuanPertama' => $tujuanPertama,
        ];

        // Tampilkan view editDataObatKeluar dengan data obatKeluar dan tempat terkait
        return view('adminPage/editDataObatKeluar', $data, compact('obatKeluar'));
    }



    public function hapusDataObatKeluar($id)
    {
        $obatKeluar = ObatKeluar::findOrFail($id);
        $idTempat = $obatKeluar->id_tempat; // Ambil id_tempat terkait

        $obatKeluar->delete();

        return redirect()->route('admin.data-obat-keluar', ['id' => $idTempat])
            ->with('success', 'Data obat Keluar berhasil dihapus!');
    }

    public function updateDataObatKeluar(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_obat' => 'required|string',
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'tanggal_distribusi' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obatKeluar = ObatKeluar::findOrFail($id);
        $obatLama = Obat::where('kode_obat', $obatKeluar->kode_obat)->first();
        $obatBaru = Obat::where('kode_obat', $request->kode_obat)->first();

        if (!$obatBaru) {
            return redirect()->back()->with('error', 'Obat tidak ditemukan.');
        }

        // Jika kode obat berubah (ganti obat)
        if ($obatKeluar->kode_obat !== $request->kode_obat) {
            // Kembalikan stok ke obat lama sebelum perubahan
            if ($obatLama) {
                $obatLama->jumlah += $obatKeluar->jumlah;
                $obatLama->save();
            }

            // Cek apakah stok cukup sebelum dikurangi
            if ($request->jumlah > $obatBaru->jumlah) {
                return redirect()->back()->with('error', 'Jumlah obat tidak mencukupi!')->withInput();
            }

            // Kurangi stok dari obat baru
            $obatBaru->jumlah -= $request->jumlah;
            $obatBaru->save();
        } else {
            // Jika hanya jumlah yang berubah
            $selisihJumlah = $request->jumlah - $obatKeluar->jumlah;

            // Cek apakah stok cukup jika jumlah bertambah
            if ($selisihJumlah > 0 && $selisihJumlah > $obatLama->jumlah) {
                return redirect()->back()->with('error', 'Jumlah obat tidak mencukupi!')->withInput();
            }

            $obatLama->jumlah -= $selisihJumlah;
            $obatLama->save();
        }

        // Update data obat keluar
        $obatKeluar->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
            'tanggal_distribusi' => $request->tanggal_distribusi,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'tujuan' => $obatKeluar->tujuan,
            'id_tempat' => $obatKeluar->id_tempat,
        ]);

        return redirect()->route('admin.data-obat-keluar', $obatKeluar->id_tempat)->with('success', 'Data obat keluar berhasil diperbarui!');
    }

    public function laporan(Request $request)
    {
        $user = Auth::user();
        $tujuan = Tempat::all();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(2),
            'tujuan' => $tujuan,
            'user' => $user,
        ];
        return view('adminPage/laporan', $data);
    }

    public function cetak(Request $request)
    {
        // Validasi input  
        $request->validate([
            'menu' => 'required',
            'tanggal_awal' => 'nullable|date', // Ubah menjadi nullable  
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal', // Ubah menjadi nullable  
        ]);

        // Ambil data dari database  
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            // Jika tanggal awal dan akhir diinput, ambil data berdasarkan rentang tanggal  
            $data = Obat::whereBetween('tanggal_kadaluarsa', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        } else {
            // Jika tidak ada tanggal yang diinput, ambil semua data  
            $data = Obat::all();
        }

        // Generate PDF  
        $pdf = Pdf::loadView('adminPage.pdf', compact('data'));

        // Unduh atau tampilkan PDF  
        return $pdf->stream('admin.pdf');
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $tujuan = Tempat::all();
        $data = [
            'title' => 'SIPEDABAT',
            'submenu' => false,
            'menuName' => $request->segment(3),
            'tujuan' => $tujuan,
            'user' => $user
        ];
        return view('adminPage/profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input  
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nik' => 'nullable|string|max:50',
            'telepon' => 'nullable|string|max:15',
            'jabatan' => 'nullable|string|max:100',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk foto profil  
        ]);

        // Update data pengguna  
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->telepon = $request->telepon;
        $user->jabatan = $request->jabatan;

        // Jika ada file yang diupload  
        if ($request->hasFile('file')) {
            // Hapus foto profil lama jika ada  
            if ($user->foto_profile) {
                Storage::delete($user->foto_profile);
            }

            // Simpan foto profil baru  
            $path = $request->file('file')->store('foto_profile', 'public');
            $user->foto_profile = $path;
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
