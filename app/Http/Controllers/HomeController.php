<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PackagePage\Pages\Models\TemplateField;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getLogout() {
       Auth::logout();
       return redirect(route('login'));
    }

     public function test() {
        $data = TemplateField::where('template', 'default')->orderBy('order', 'asc')->get();
        // dd(($data->data));
        return view('test', compact('data'));
    }


    public function getData() {
        $data = 
        '{
          "data": [
            {
              "DT_RowId": "row_1",
              "title": "The Final Empire: Mistborn",
              "author": "Brandon Sanderson",
              "duration": "1479",
              "readingOrder": "1"
            },
            {
              "DT_RowId": "row_2",
              "title": "The Name of the Wind",
              "author": "Patrick Rothfuss",
              "duration": "983",
              "readingOrder": "2"
            },
            {
              "DT_RowId": "row_3",
              "title": "The Blade Itself: The First Law",
              "author": "Joe Abercrombie",
              "duration": "1340",
              "readingOrder": "3"
            },
            {
              "DT_RowId": "row_4",
              "title": "The Heroes",
              "author": "Joe Abercrombie",
              "duration": "1390",
              "readingOrder": "4"
            },
            {
              "DT_RowId": "row_5",
              "title": "Assassin\'s Apprentice: The Farseer Trilogy",
              "author": "Robin Hobb",
              "duration": "1043",
              "readingOrder": "5"
            },
            {
              "DT_RowId": "row_6",
              "title": "The Eye of the World: Wheel of Time",
              "author": "Robert Jordan",
              "duration": "1802",
              "readingOrder": "6"
            },
            {
              "DT_RowId": "row_7",
              "title": "The Wise Man\'s Fear",
              "author": "Patrick Rothfuss",
              "duration": "1211",
              "readingOrder": "7"
            },
            {
              "DT_RowId": "row_8",
              "title": "The Way of Kings: The Stormlight Archive",
              "author": "Brandon Sanderson",
              "duration": "2734",
              "readingOrder": "8"
            },
            {
              "DT_RowId": "row_9",
              "title": "The Lean Startup",
              "author": "Eric Ries",
              "duration": "523",
              "readingOrder": "9"
            },
            {
              "DT_RowId": "row_10",
              "title": "House of Suns",
              "author": "Alastair Reynolds",
              "duration": "1096",
              "readingOrder": "10"
            },
            {
              "DT_RowId": "row_11",
              "title": "The Lies of Locke Lamora",
              "author": "Scott Lynch",
              "duration": "1323",
              "readingOrder": "11"
            },
            {
              "DT_RowId": "row_12",
              "title": "Best Served Cold",
              "author": "Joe Abercrombie",
              "duration": "1592",
              "readingOrder": "12"
            },
            {
              "DT_RowId": "row_13",
              "title": "Thinking, Fast and Slow",
              "author": "Daniel Kahneman",
              "duration": "1206",
              "readingOrder": "13"
            },
            {
              "DT_RowId": "row_14",
              "title": "The Dark Tower I: The Gunslinger",
              "author": "Stephen King",
              "duration": "439",
              "readingOrder": "14"
            },
            {
              "DT_RowId": "row_15",
              "title": "Theft of Swords: Riyria Revelations",
              "author": "Michael J. Sullivan",
              "duration": "1357",
              "readingOrder": "15"
            },
            {
              "DT_RowId": "row_16",
              "title": "The Emperor\'s Blades: Chronicle of the Unhewn Throne",
              "author": "Brian Staveley",
              "duration": "1126",
              "readingOrder": "16"
            },
            {
              "DT_RowId": "row_17",
              "title": "The Magic of Recluce: Saga of Recluce",
              "author": "L. E. Modesitt Jr.",
              "duration": "1153",
              "readingOrder": "17"
            },
            {
              "DT_RowId": "row_18",
              "title": "Red Country",
              "author": "Joe Abercrombie",
              "duration": "1196",
              "readingOrder": "18"
            },
            {
              "DT_RowId": "row_19",
              "title": "Warbreaker",
              "author": "Brandon Sanderson",
              "duration": "1496",
              "readingOrder": "19"
            },
            {
              "DT_RowId": "row_20",
              "title": "Magician",
              "author": "Raymond E. Feist",
              "duration": "2173",
              "readingOrder": "20"
            },
            {
              "DT_RowId": "row_21",
              "title": "Blood Song",
              "author": "Anthony Ryan",
              "duration": "1385",
              "readingOrder": "21"
            },
            {
              "DT_RowId": "row_22",
              "title": "Half a King",
              "author": "Joe Abercrombie",
              "duration": "565",
              "readingOrder": "22"
            },
            {
              "DT_RowId": "row_23",
              "title": "Prince of Thorns: Broken Empire",
              "author": "Mark Lawrence",
              "duration": "537",
              "readingOrder": "23"
            },
            {
              "DT_RowId": "row_24",
              "title": "The Immortal Prince: Tide Lords",
              "author": "Jennifer Fallon",
              "duration": "1164",
              "readingOrder": "24"
            },
            {
              "DT_RowId": "row_25",
              "title": "Medalon: Demon Child",
              "author": "Jennifer Fallon",
              "duration": "1039",
              "readingOrder": "25"
            },
            {
              "DT_RowId": "row_26",
              "title": "The Black Company: Chronicles of The Black Company",
              "author": "Glen Cook",
              "duration": "654",
              "readingOrder": "26"
            }
              ],
              "options": [],
              "files": []
        }';

        return json_decode($data);
    }
}
