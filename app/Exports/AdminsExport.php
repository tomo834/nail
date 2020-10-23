<?php

namespace App\Exports;

use App\AdminSample;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use \Illuminate\Support\Facades\Log;

class AdminsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
        	'2020/10/1',
            "株式会社",
            "山田太郎",
            "000-0000",
            "東京都千代田区千代田１−１",
            "000-0000-0000",
            "00-0000-0000",
            "00-0000-0000",
            "店",
            "山田太郎",
            "誕生日",
            "aaa@a.com",
            "000-0000",
            "東京都千代田区千代田１−１",
            "00-0000-0000",
            "9:00-17:00",
            "○",
            "https://aaa.com",
            "山田太郎",
            "銀行",
            "支店",
            "1111",
            "111",
            "普通",
            "0000000",
            "10",
            "○",
            "○",
            "○",
            "○",
            "○",
            "○",
            "2020/10/1",
        ]);
    }

    public function headings():array
	{
		return [
				"申込日",
                "法人名",
                "代表者",
                "郵便番号",
                "住所",
                "携帯電話番号",
                "電話番号",
                "FAX",
                "店舗名",
                "責任者",
                "誕生日",
                "メールアドレス",
                "店舗郵便番号",
                "店舗住所",
                "店舗電話番号",
                "営業時間",
                "ネイリストの有無",
                "ホームページ",
                "口座名義",
                "銀行名",
                "支店名",
                "金融コード",
                "支店コード",
                "口座タイプ",
                "口座番号",
                "インセンティブ",
                "必要書類",
                "履歴事項証明",
                "印鑑証明",
                "振り込み通帳画像",
                "住民票",
                "開発業、確定申告書、営業許可書",
                "登録通知書お知らせ",
			]; 
	}
}
