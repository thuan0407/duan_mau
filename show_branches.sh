#!/bin/bash

echo "=== CÁC NHÁNH LOCAL ==="
git branch

echo ""
echo "=== CÁC NHÁNH REMOTE ==="
git branch -r

echo ""
echo "=== TẤT CẢ CÁC NHÁNH (LOCAL + REMOTE) ==="
git branch -a

echo ""
echo "=== NHÁNH HIỆN TẠI ==="
git branch --show-current

echo ""
echo "=== ĐỂ CHECKOUT NHÁNH TUNGANH ==="
echo "git checkout -b tunganh origin/tunganh"

