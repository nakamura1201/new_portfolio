@echo off
cd /d D:\project\example
start cmd /k php -S localhost:8000
start cmd /k browser-sync start --config bs-config.json
