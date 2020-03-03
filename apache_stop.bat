@echo off
cd /D %~dp0
cmd.exe /C start "" /MIN call "C:\Users\genev\Documents\CPSC304\Milestone4\killprocess.bat" "httpd.exe"
if not exist apache\logs\httpd.pid GOTO exit
del apache\logs\httpd.pid

:exit
