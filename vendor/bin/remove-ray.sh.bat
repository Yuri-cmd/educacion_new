@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../spatie/ray/bin/remove-ray.sh
bash "%BIN_TARGET%" %*
