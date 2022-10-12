<?php

namespace App\Exports;

use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
//use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromView,WithDrawings  //todo esto es para poder crear un excel de un vista blade
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //public function collection()
    //{
        
    //}
    public $fechamin;
    public $fechamax;
    public $diseno;
    public $filtracion;
    public $tickets;
    public $users;

    public function __construct($fechamin,$fechamax,$diseno,$filtracion,$tickets,$users){

        $this->fechamin = $fechamin;
        $this->fechamax = $fechamax;
        $this->diseno = $diseno;
        $this->filtracion = $filtracion;
        $this->tickets = $tickets;
        $this->users = $users;

    }
    //para agregar imangenes en el excel solo hay que indicar donde las quieres

    public function drawings(){

        if($this->diseno=="Fersan"){

            $drawing3 = new Drawing();
            $drawing3->setName('cimiclogo');
            $drawing3->setDescription('This is logo');
            $drawing3->setPath(public_path('img/logos/LOGOS_FERSAN_ISOTIPO.png'));
            $drawing3->setHeight(130);
            $drawing3->setCoordinates('A1');

        }else if($this->diseno=="Chaixtsu"){

            $drawing3 = new Drawing();
            $drawing3->setName('cimiclogo');
            $drawing3->setDescription('This is logo');
            $drawing3->setPath(public_path('img/logos/LOGOS_CHAIXTSU_ISOTIPO.png'));
            $drawing3->setHeight(130);
            $drawing3->setCoordinates('A1');

        }else if($this->filtracion=="Navarra"){

            $drawing3 = new Drawing();
            $drawing3->setName('cimiclogo');
            $drawing3->setDescription('This is logo');
            $drawing3->setPath(public_path('img/logos/LOGOS_NAVARRA_ISOTIPO.png'));
            $drawing3->setHeight(130);
            $drawing3->setCoordinates('A1');

        }

         return [$drawing3];

    }
    public function view(): View{
        $fechamin=$this->fechamin;
        $fechamax=$this->fechamax;
        $diseno=$this->diseno; 
        $filtracion=$this->filtracion;
        $tickets=$this->tickets;
        $users=$this->users;
        return view("Reportes.reporte_Excel",compact("fechamin","fechamax","diseno","filtracion","tickets","users"));
    }
}
