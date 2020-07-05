#!/bin/bash 
for file in pages/*; do
    filename="${file%.*}"
    markdown -o temp.html -F MKD_NODLDISCOUNT,MKD_AUTOLINK "$file"
    cat res/template_header.html temp.html res/template_footer.html > $filename.html
    tidy -q -m $filename.html
    rm temp.html
done
mv pages/*.html ./