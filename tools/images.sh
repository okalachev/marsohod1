#!/bin/bash
# Обработать папку с фотографиями (сделать превьюшки, резайзнуть)
# 1 параметр - название папки с фотографиями в /media/___photo_source
# 2 параметр - размер провьюшек по вертикали (по умолчанию 120)
# --noyaml - не создавать yaml-файл со списком изображений

if [ `uname -o` == "Cygwin" ]
then
	# !TODO: fix
	shopt -s expand_aliases
	alias convert="`pwd`/convert.exe"
fi

# Основные параметры
if [ "$1" == "" ]
then
	echo "Missing photos directory name!"
	exit 1
fi
SOURCE=$1

shift
VSIZE=120
if [ $1 ]
then
	VSIZE=$1
fi

YAML=../../../data/auto/$SOURCE.photo.yaml

# Дополнительные параметры
shift
while [ $1 ]
do
    case $1 in
        "--noyaml" )
            YAML=/dev/null
            ;;
        * )
            echo "Unknown option: $1" >&2
            exit 1
            ;;
    esac
    shift
done

cd ..

echo "Folder: "$SOURCE"; V-size: $VSIZE"

# Удаляем yaml-карту папки
rm data/auto/$SOURCE.photo.yaml

# Удяляем все фотки из папки
rm -rf "media/photo/$SOURCE"
rm -rf "media/thumb/$SOURCE"
mkdir "media/photo/$SOURCE"
mkdir "media/thumb/$SOURCE"

# Входим в папку исходных фотографий
cd media/___photo_source/$SOURCE/

# Пробегаем по фоткам и ресайзим их
for f in *
do
	echo -n "$f ."
	convert -resize x600 "$f" "../../photo/$SOURCE/$f"
	echo -n "."
	convert -size x$VSIZE -resize x$VSIZE "$f" "../../thumb/$SOURCE/$f"
	echo "."
	echo "- $SOURCE/$f" >> $YAML
done

cd -
