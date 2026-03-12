<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = [
        'greating_home_1',
        'greating_home_2',
        'greating_home_3',
        'visi',
        'misi',
        'foto_sejarah_1',
        'foto_sejarah_2',
        'foto_sejarah_3',
        'foto_sejarah_4',
        'sejarah',

        'desc_wahana',
        'desc_gallery',
        'desc_facilities',
        'desc_our_menu',
        'desc_our_menu_home',
        'desc_event',
        'desc_event_home',

        'kedai_senin',
        'kedai_selasa',
        'kedai_rabu',
        'kedai_kamis',
        'kedai_jumat',
        'kedai_sabtu',
        'kedai_minggu',

        'wahana_senin',
        'wahana_selasa',
        'wahana_rabu',
        'wahana_kamis',
        'wahana_jumat',
        'wahana_sabtu',
        'wahana_minggu',

        'slider_delay',
        'title_footer',
        'desc',

        'link_instagram',
        'link_facebook',
        'link_youtube',
        'link_tiktok',
        'link_maps',

        'alamat',
        'whatsapp',
    ];


     public function groupedKedai()
    {
        return $this->groupDays('kedai_');
    }

    
    public function groupedWahana()
    {
        return $this->groupDays('wahana_');
    }

    
    private function groupDays($prefix)
    {
        $days = ['senin','selasa','rabu','kamis','jumat','sabtu','minggu'];
        $schedule = [];

        foreach ($days as $day) {
            $column = $prefix.$day;
            $schedule[$day] = $this->$column ?? '';
        }

        $result = [];
        $temp = [];

        foreach ($days as $day) {
            $value = $schedule[$day];

            if (empty($temp)) {
                $temp = ['start'=>$day, 'end'=>$day, 'value'=>$value];
            } elseif ($temp['value'] === $value) {
                $temp['end'] = $day;
            } else {
                $result[] = $temp;
                $temp = ['start'=>$day, 'end'=>$day, 'value'=>$value];
            }
        }

        if (!empty($temp)) {
            $result[] = $temp;
        }

        return $result;
    }
}
