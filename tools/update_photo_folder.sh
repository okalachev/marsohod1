#!/bin/bash
# Обработать папку с фотографиями (сделать превьюшки, резайзнуть)
# 1 параметр - название папки с фотографиями в /media/__photo_source
# 2 параметр - размер провьюшек по вертикали (по умолчанию 120)

if [ "$1" == "" ]
then
	echo "Missing photos directory name!"
	exit 1
fi

if [ `uname -o` == "Cygwin" ]
then
	# !TODO: fix
	shopt -s expand_aliases
	alias convert="`pwd`/convert.exe"
fi

VSIZE=120
if [ $2 ]
then
	VSIZE=$2
fi

cd ..

echo "Folder: "$1"; V-size: $VSIZE"

# Удаляем yaml-карту папки
rm data/auto/$1.photo.yaml

# Удяляем все фотки из папки
rm -rf "media/photo/$1"
rm -rf "media/thumb/$1"
mkdir "media/photo/$1"
mkdir "media/thumb/$1"

# Входим в папку исходных фотографий
cd media/__photo_source/$1/

# Пробегаем по фоткам и ресайзим их
for f in *
do
	echo -n "$f ."
	convert -resize x600 "$f" "../../photo/$1/$f"
	echo -n "."
	convert -size x$VSIZE -resize x$VSIZE "$f" "../../thumb/$1/$f"
	echo "."
	echo "- $1/$f" >> ../../../data/auto/$1.photo.yaml
done

cd -
