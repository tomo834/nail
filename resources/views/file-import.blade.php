@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">店舗インポート</h2>
            <p>Excelフォーマット</p>
            <div class=" table-responsible">
                <table class="table text-nowrap table-bordered">
                    <tr>
                        <th>申込日</th>
                        <th class="text-danger">法人名</th>
                        <th>代表者</th>
                        <th>郵便番号</th>
                        <th>住所</th>
                        <th>携帯電話番号</th>
                        <th>電話番号</th>
                        <th>FAX</th>
                        <th>店舗名</th>
                        <th>責任者</th>
                        <th>誕生日</th>
                        <th class="text-danger">メールアドレス</th>
                        <th>店舗郵便番号</th>
                        <th>店舗住所</th>
                        <th>店舗電話番号</th>
                        <th>営業時間</th>
                        <th>ネイリストの有無</th>
                        <th>ホームページ</th>
                        <th>口座名義</th>
                        <th>銀行名</th>
                        <th>支店名</th>
                        <th>金融コード</th>
                        <th>支店コード</th>
                        <th>口座タイプ</th>
                        <th>口座番号</th>
                        <th class="text-danger">インセンティブ</th>
                        <th>必要書類</th>
                        <th>履歴事項証明</th>
                        <th>印鑑証明</th>
                        <th>振り込み通帳画像</th>
                        <th>住民票</th>
                        <th>開発業、確定申告書、営業許可書</th>
                        <th>登録通知書お知らせ</th>
                    </tr>
                    <tr>
                        <td>日付</td>
                        <td class="text-danger">必須　文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>日付</td>
                        <td class="text-danger">必須、重複不可</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>○もしくは空欄</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td>文字列</td>
                        <td class="text-danger">数字</td>
                        <td>○もしくは空欄</td>
                        <td>○もしくは空欄</td>
                        <td>○もしくは空欄</td>
                        <td>○もしくは空欄</td>
                        <td>○もしくは空欄</td>
                        <td>○もしくは空欄</td>
                        <td>日付</td>
                    </tr>
                </table>
            </div>

            @if (Auth::guard('admin')->user()->type === "99")
                <p>追加できるのは代理店のみです。特約店は代理店、加盟店は特約店からのみ登録できます。</p>
            @elseif (Auth::guard('admin')->user()->type === "1")
                <p>追加できるのは特約店のみです。加盟店は特約店からのみ追加できます。</p>
            @elseif (Auth::guard('admin')->user()->type === "2")
                <p>追加できるのは加盟店のみです。</p>
            @endif

            <form action="{{ url('admin/file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <button class="btn btn-primary">代理店追加</button>
                <a class="btn btn-success" href="{{ url('admin/file-export') }}">サンプルダウンロード</a>
            </form>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>