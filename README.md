# 飲食店予約サービス

ある企業グループ会社の飲食店予約サービス  
< ---トップ画面の画像--- >

## 作成した目的

外部の飲食店サービスは手数料を取られるので、自社で予約サービスを持ち費用を削減するため

## アプリケーションURL

- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/  
※マイページへのアクセスはログインが必要

## 他のレポジトリ

なし

## 機能一覧

- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザーのお気に入り飲食店一覧取得
- ユーザーの飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- 飲食店エリア検索
- 飲食店ジャンル検索
- 飲食店名検索

## 使用技術（実行環境）

- PHP 7.4
- MySQL 8.0
- Laravel 8.83

## テーブル設計
### Usersテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREGIN KEY | Note |
| ---- | ---- | ---- | ---- | ---- | ---- | ---- |
| id | bigint unsigned | ○ |  | ○ |  |  |
| name | varchar(191) |  |  | ○ |  |  |
| email | varchar(191) |  | ○ | ○ |  |  |
| password | varchar(191) |  |  | ○ |  |  |
| created_at | timestamp |  |  |  |  |  |
| updated_at | timestamp |  |  |  |  |  |  

### Restaurantsテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY | Note |
| ---- | ---- | ---- | ---- | ---- | ---- | ---- |
| id | bigint unsigned | ○ |  | ○ |  |  |
| shop | varchar(255) |  |  | ○ |  |  |
| area | varchar(255) |  |  | ○ |  |  |
| genre | varchar(255) |  |  | ○ |  |  |
| summary | text |  |  | ○ |  |  |
| img_url | varchar(2083) |  |  | ○ |  |  |
| created_at | timestamp |  |  |  |  |  |
| updated_at | timestamp |  |  |  |  |  |  

### Reservationsテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY | Note |
| ---- | ---- | ---- | ---- | ---- | ---- | ---- |
| id | bigint unsigned | ○ |  | ○ |  |  |
| shop_id | bigint unsigned |  |  | ○ | restaurants(id) |  |
| date | date |  |  | ○ |  |  |
| time | time |  |  | ○ |  |  |
| number | integer |  |  | ○ |  |  |
| created_at | timestamp |  |  |  |  |  |
| updated_at | timestamp |  |  |  |  |  |  

### Favoritesテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY | Note |
| ---- | ---- | ---- | ---- | ---- | ---- | ---- |
| id | bigint unsigned | ○ |  | ○ |  |  |
| user_id | bigint unsigned |  |  | ○ | users(id) |  |
| shop_id | bigint unsigned |  |  | ○ | restaurants(id) |  |
| created_at | timestamp |  |  |  |  |  |
| updated_at | timestamp |  |  |  |  |  |  

### Evaluationsテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY | Note |
| ---- | ---- | ---- | ---- | ---- | ---- | ---- |
| id | bigint unsigned | ○ |  | ○ |  |  |
| user_id | bigint unsigned |  |  | ○ | users(id) |  |
| shop_id | bigint unsigned |  |  | ○ | restaurants(id) |  |
| evaluation | tinyint |  |  |  |  | 1～5までの5段階評価 |
| comment | text |  |  |  |  |  |
| created_at | timestamp |  |  |  |  |  |
| updated_at | timestamp |  |  |  |  |  |  

## ER図

<img src="/src/public/img/ER_diagram_advance.jpg">

# 環境構築
## Dockerビルド
1. Git clone https://github.com/nobu1/advanced-test.git
1. docker-compose up -d --build
※MYSQLは、OSによって起動しない場合があるので、  
それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください

## Laravel環境構築
1. docker-compose exec php bash
1. composer install
1. env.exampleファイルから.envを作成し、環境変数を変更
1. php artisan key:generate
1. php artisan migrate
1. php artisan db:seed

## ほかに記載することがあれば記述

アカウントの種類（テストユーザーなど）