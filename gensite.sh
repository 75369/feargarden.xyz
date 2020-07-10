#!/bin/bash 
printf "# blog\n\n![header](https://feargarden.xyz/blog/res/monkaS/sayo.png)\n\nMy personal blog." > pages/blog.md
for file in posts/*; do
    filename="${file%.*}"
    title=$(head -1 $file | cut -c 3-) 
    date=$(sed '3q;d' $file | cut -c 4-)
    printf "\n\n* [$title](blog/$filename.html) $date" >> pages/blog.md
done
for file in pages/*; do
    filename="${file%.*}"
    markdown -o temp.html -F MKD_AUTOLINK "$file"
    cat res/template_header.html temp.html res/template_footer.html > $filename.html
    tidy -q -m $filename.html
    rm temp.html
done
mkdir blog
mv pages/blog.html blog/index.html
mv pages/*.html ./
for file in posts/*; do
    filename="${file%.*}"
    markdown -o temp.html -F MKD_AUTOLINK "$file"
    cat res/template_header_blog.html temp.html res/template_footer.html > $filename.html
    tidy -q -m $filename.html
    rm temp.html
done
mv posts/*.html blog/
echo "Script finished"