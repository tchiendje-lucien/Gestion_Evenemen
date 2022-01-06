<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class EventController extends Controller
{
    public function create_event()
    {
        $id_user = session::get('id_user');
        if (!isset($id_user) || empty($id_user)) {
            return redirect('login');
        } else {
            $select_events = DB::table('evenements')
                ->where('ID_USER', session::get("id_user"))
                ->where('ETAT_EVENT', 1)
                ->get();
            return view(
                'events.create_event',
                [
                    "select_events" => $select_events
                ]
            );
        }
    }

    public function create_agenda()
    {
        $id_user = session::get('id_user');
        if (!isset($id_user) || empty($id_user)) {
            return redirect('login');
        } else {
            $select_events = DB::table('evenements')
                ->where('ID_USER', session::get("id_user"))
                ->get();
            return view(
                'events.agenda',
                [
                    "select_events" => $select_events
                ]
            );
        }
    }

    function verify_input($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }

    public function store_event(Request $req)
    {
        $title_event = self::verify_input($req->input('title_event'));
        $date_start = self::verify_input($req->input('date_start'));
        $date_end = self::verify_input($req->input('date_end'));
        $desc_event = self::verify_input($req->input('desc_event'));
        $REGEX_DATE = '/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/';

        $insert_event = DB::table('evenements')->insert(
            [
                "ID_USER" => session::get('id_user'),
                "TITRE_EVENT" => $title_event,
                "DESC_EVENT" => $desc_event,
                "ETAT_EVENT" => 1,
                "START_EVENT" => $date_start,
                "END_EVENT" => $date_end,
                "DATE_CREATE" => Carbon::now(),
                "DATE_UPDATE" => Carbon::now(),
            ]
        );

        if ($insert_event) {
            return back()->with('success', "l'evenement a ete ajouter avec susscess !!!");
        } else {
            return back()->with('error', "Une erreure c'est produite lors de l'enregistrement de l'evenement!!! s'il vous plais veillez reessayer");
        }
    }

    public function edit_event(Request $req, $id_event)
    {
        $select_events = DB::table('evenements')
            ->where('ID_EVENT', $id_event)
            ->where('ID_USER', session::get('id_user'))
            ->get();
        return view(
            'events.edit_event',
            [
                "select_events" => $select_events
            ]
        );
    }

    public function update_event(Request $req, $id_event)
    {
        $title_event = self::verify_input($req->input('title_event'));
        $date_start = self::verify_input($req->input('date_start'));
        $date_end = self::verify_input($req->input('date_end'));
        $desc_event = self::verify_input($req->input('desc_event'));

        $req->validate([
            'title_event' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'desc_event' => 'required',
        ]);

        $update_request = DB::table('evenements')
            ->where('ID_EVENT', $id_event)
            ->update([
                "TITRE_EVENT" => $title_event,
                "DESC_EVENT" => $desc_event,
                "START_EVENT" => $date_start,
                "END_EVENT" => $date_end,
                "DATE_UPDATE" => Carbon::now()
            ]);
        if ($update_request) {
            return redirect('/')->with('success', "l'evenement a ete modifier avec susscess !!!");
        } else {
            return back()->with('error', "Une erreure c'est produite lors de la modification de l'evenement!!! s'il vous plais veillez reessayer");
        }
    }

    public function delete_event(Request $req, $id_event)
    {
        $update_request = DB::table('evenements')
        ->where('ID_EVENT', $id_event)
        ->update([
            "ETAT_EVENT" => 0,
            "DATE_UPDATE" => Carbon::now()
        ]);
        if ($update_request) {
            return back()->with('success', "l'evenement a ete supprimer avec susscess !!!");
        } else {
            return back()->with('error', "Une erreure c'est produite lors de la suppression de l'evenement !!! s'il vous plais veillez reessayer");
        }
    }

    public function active_event($id_event)
    {
        $update_request = DB::table('evenements')
        ->where('ID_EVENT', $id_event)
        ->update([
            "ETAT_EVENT" => 1,
            "DATE_UPDATE" => Carbon::now()
        ]);
        if ($update_request) {
            return back()->with('success', "l'evenement a ete activer avec susscess !!!");
        } else {
            return back()->with('error', "Une erreure c'est produite lors de l'activation de l'evenement!!! s'il vous plais veillez reessayer");
        }
    }
}
