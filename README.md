# DeShu-Note

## What's this? | これはなに？

休肝日を管理するWebアプリです。  

## Usage | つかいかた

iPhoneのブラウザでアクセスします。  

![./images/site-image-1.png'] ![./images/site-image-2.png]

phpが動作するWebサーバーのドキュメントルート以下にプログラムファイルdeshu.phpを配置します。  

プログラムファイル配置ディレクトリ中のデータディレクトリ「deshu-note」下にyyyymmdd（休肝日の日付）.deshuというファイル名のデータを配置します。  

yyyymmdd.activeというファイルがある場合、その日付以前の年月は記録なし扱いとなります。  

- \[prog_dir\]
    - deshu.php
    - \[deshu-note\]
        - 20180101.active
        - 20180106.deshu
        - 20180117.deshu
        - ...

## License

This code has released under the MIT license.  
[http://opensource.org/licenses/MIT](http://opensource.org/licenses/MIT)

## TODO list

- [ ] 日々の飲酒量を管理
- [ ] データベース対応
