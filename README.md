## udemy Laravel講座

## ダウンロード方法

git clone
git clone https://github.com/tackernao0522/udemy_aoki_ecommerce.git

git clone ブランチを指定してダウンロードする場合
git clone -b ブランチ名 https://github.com/tackernao0522/udemy_aoki_ecommerce.git

もしくはzipファイルでダウンロードしてください

## インストール方法

cd udemy_aoki_ecommerce
composer install
npm install
npm run dev

.env.exampleをコピーして .envファイルを作成

.envファイルの中の下記をご利用の環境に合わせて変更してください。

ローカルサーバー起動後
php artisan migrate:fresh --deed
と実行してください。(データベーステーブルとダミーデータが追加されればOK)

最後に
php artisan key:generate
と入力してキーを生成後、

php artisan serve
で簡易サーバーを立ち上げ、表示確認してください。

## インストール後の実施事項

画像のダミーデータは
public/imagesフォルダ内に
sample1.jpg 〜 sample.jpgとして
保存しています。

php artisan storage:linkで
storageフォルダにリンク後、

storage/app/public/productsフォルダ内に
保存すると表示されます。
(productsフォルダがない場合は作成してください。)

ショップの画像も表示する場合は、
storage/app/public/shopsフォルダ内を作成し
画像を保存してください。
