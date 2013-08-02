# Raspberry Pi + DHT22 溫濕度記錄
將 DHT22 的數據定時抓取並處理輸出在頁面上
該跑的程式都放在 script/ 裡面了，請自行用 crontab 去跑

DHT_script 執行後每 5 秒會抓取一次數據放入 docs/temp.txt 與 xml/temp.xml 中，
經過 50 秒後會結束。

## Requirement
- 一台已經與 DHT22 整合完畢的 Raspberry Pi
- 擁有系統 root 權限
- 網路
- Apache/2.2.22
- PHP 5.4.4-14+deb7u3

## Installation
懶得打，目前
