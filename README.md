# Atte

## 作成した目的
企業内の人事評価を目的として作成された勤怠管理システムです

## アプリケーションURL
http://localhost/

## 他のリポジトリ

## 機能一覧

## 使用技術（実行環境）
- PHP 8.1.26
- Laravel 9.52.16
- MySQL 15.1

## テーブル設計

## ER図
![Atte_ER-Diagram](src/Atte.drawio.png)

## 環境構築

 1. ```docker-compose exec php bash```
 2. ```composer install```
 3. .env.exampleファイルから.envを作成し、環境変数を変更
 4. ```php artisan key:generate```
 5. ```php artisan migrate```
 6. ```php artisan db:seed```
 7. ```php artisan schedule:work```

## 補足事項
開発用の仮想のSMTPサーバーとして、Mailtrapを使用しています。サービスの登録と.envファイルの編集が必要です

利用には会員登録が必要となります
初めて利用する方は、環境構築後に以下のURLから登録してください
- 会員登録ページ:http://localhost/register

なおdb:seedでは、確認用の仮データとして以下のデータが挿入されます。
- 会員登録済みユーザー：user01からuser10までの10名分のユーザー
- メールアドレス：user01@example.comからuser01@example.comまで、上記ユーザー名に対応したアドレス名
- パスワード：coachtech
- 勤務データ：2024-01-01〜03まで10件のランダムデータを登録