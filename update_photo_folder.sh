#!/bin/bash
# Обработать папку с фотографиями (сделать превьюшки, резайзнуть)
# Параметр - название папки с фотографиями в /media/__photo_source

# Удаляем yaml-карту папки
rm $1.photo.yaml

# Удяляем все фотки из папки
rm "media/photo/$1/*"
rm "media/thumb/$1/*"

# Входим в папку исходных фотографий
cd media/__photo_source/$1/

# Пробегаем по фоткам и ресайзим их
for f in *
do
	echo "Processing $f: original..."
	convert -resize x600 "$f" "../../photo/$1/$f"
	echo "Thumbnail..."
	convert -size x120 -resize x120 "$f" "../../thumb/$1/$f"
	echo "Writing to YAML-file..."
	echo "$1/$f" >> ../../../$1.photo.yaml
	echo "Done"
done