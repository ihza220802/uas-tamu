<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Http\Request;
use App\Charts\TamuLineChart;

// use Monolog\Handler\IFTTTHandler;
// use PgSql\Result;

class tamuController extends Controller
{
    public function index()
    {
        $title = "Data tamu";
        $tamus = Tamu::orderBy('id', 'asc')->get();
        return view('tamus.index', compact(['tamus', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data tamu";
        $managers = User::where('position', '1')->orderBy('id', 'asc')->get();
        return view('tamus.create', compact('title', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tamu' => 'required'
        ]);

        $tamu = [
            'id_tamu' => $request->id_tamu,
            'nama_alamat' => $request->nama_alamat,
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
        ];
        // // for ($i=1; $i <= 2; $i++) {
        // //     $details = [

        // //     ];
        // // }
        // // dd($request);

        // tamu::create($request->post());

        if ($result = Tamu::create($tamu)) {
            for ($i = 1; $i <= $request->jml; $i++) {
                $details = [
                    'id_tamu' => $request->id_tamu,
                    'id_acara' => $request['id_acara' . $i],
                    'tamu' => $request['tamu' . $i],
                    'keterangan' => $request['keterangan' . $i]

                ];
                Detail::create($details);
            }
        }

        return redirect()->route('tamus.index')->with('success', 'tamus has been created successfully.');
    }

    public function show(Tamu $tamu)
    {
        return view('tamus.show', compact('Departement'));
    }

    public function edit(Tamu $tamu)
    {
        $title = "Edit Data tamu";
        $managers = User::where('position', '1')->orderBy('id', 'asc')->get();
        $detail = Detail::where('id_tamu', $tamu->id_tamu)->orderBy('id', 'asc')->get();
        return view('tamus.edit', compact('tamu', 'title', 'managers', 'detail'));
    }

    public function update(Request $request, Tamu $tamu)
    {
        $tamus = [
            'id_tamu' => $tamu->id_tamu,
            'nama_alamat' => $request->nama_alamat,
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            // 'total' => $request->total,
        ];
        if ($tamu->fill($tamus)->save()) {
            Detail::where('id_tamu', $tamu->id_tamu)->delete();
            for ($i = 1; $i <= $request->jml; $i++) {
                $details = [
                    'id_tamu' => $tamu->id_tamu,
                    'id_acara' => $request['id_acara' . $i],
                    'acara' => $request['acara' . $i],
                    'tempat' => $request['tempat' . $i],
                    'pelaksana' => $request['nama' . $i],
                    'tamu' => $request['tamu' . $i],
                    'keterangan' => $request['keterangan' . $i],
                ];
                Detail::create($details);
            }
        }
        return redirect()->route('tamus.index')->with('success', 'tamu Has Been updated successfully');
    }

    public function destroy(Tamu $tamu)
    {
        $tamu->delete();
        return redirect()->route('tamus.index')->with('success', 'tamu has been deleted successfully');
    }

    public function exportPdf()
    {
        $title = "Laporan Data tamu";
        $tamus = Tamu::orderBy('id', 'asc')->get();

        $pdf = PDF::loadview('tamus.pdf', compact(['tamus', 'title']));
        return $pdf->stream('laporan-tamus-pdf');
    }

    public function chartLine()
    {
        $api = url(route('tamus.chartLineAjax'));

        $chart = new TamuLineChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);
        $title = "Chart Ajax";
        return view('chart', compact('chart', 'title'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');
        $tamus = Tamu::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('tanggal', $year)
            ->groupBy(\DB::raw("Month(tanggal)"))
            ->pluck('count');

        $chart = new TamuLineChart;

        $chart->dataset('tamu Register Chart', 'line', $tamus)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return $chart->api();
    }
}
