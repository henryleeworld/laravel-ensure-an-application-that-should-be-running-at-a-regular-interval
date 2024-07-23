# Laravel 10 確保應用程式應該定期運行

引入 dyrynda 的 laravel-defibrillator 套件來擴增確保應用程式應該定期運行，同時協助追踪應用程式中預期定期調用的各個元件。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __schedule:run__ 來衡量排定的任務並執行預定任務。
```sh
$ php artisan schedule:run
```

----

## 畫面截圖
![](https://i.imgur.com/jvlZUXe.png)
> 在正常操作範圍內，任務排程將每 60 秒執行一次，並將快取值再推送 90 秒