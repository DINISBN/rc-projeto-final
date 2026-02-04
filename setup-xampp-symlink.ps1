# Script para configurar um symlink do XAMPP para o diretório do OneDrive
# Execute este script UMA VEZ para configurar. Depois não precisa fazer mais nada!

$sourcePath = "c:\Users\Dinis\OneDrive\Documentos\Esccola\rc-projeto-final"
$linkPath = "C:\xampp\htdocs\rc-projeto-final"

Write-Host "A configurar symlink para o XAMPP..." -ForegroundColor Yellow

# Verificar se o link já existe
if (Test-Path $linkPath) {
    $item = Get-Item $linkPath
    if ($item.LinkType -eq "Junction" -or $item.LinkType -eq "SymbolicLink") {
        Write-Host "Já existe um symlink em $linkPath" -ForegroundColor Green
        Write-Host "Target: $($item.Target)" -ForegroundColor Cyan
        exit
    } else {
        Write-Host "A remover diretório existente..." -ForegroundColor Yellow
        Remove-Item -Path $linkPath -Recurse -Force
    }
}

# Criar o junction point
Write-Host "A criar junction point..." -ForegroundColor Yellow
Write-Host "Origem: $sourcePath" -ForegroundColor Cyan
Write-Host "Link: $linkPath" -ForegroundColor Cyan

New-Item -ItemType Junction -Path $linkPath -Target $sourcePath -Force | Out-Null

Write-Host "`nConfiguração concluída!" -ForegroundColor Green
Write-Host "Agora o XAMPP serve diretamente do OneDrive." -ForegroundColor Green
Write-Host "Qualquer mudança (incluindo git pull) será imediatamente visível!" -ForegroundColor Green
Write-Host "`nPode aceder a: http://localhost/rc-projeto-final/catalogo.php" -ForegroundColor Green
