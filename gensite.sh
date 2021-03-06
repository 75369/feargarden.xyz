#!/bin/bash 
printf "# blog\n\n->![header](/images/sayo.png)<-\n\nMy personal blog." > pages/blog.md
for file in posts/*; do
    blogid=$(basename "${file%.*}")
    title=$(head -1 $file | cut -c 3-) 
    date=$(sed '3q;d' $file | cut -c 4-)
    printf "\n\n* [$title]($blogid.html) $date" >> pages/blog.md
done
for file in pages/*; do
    filename="${file%.*}"
    markdown -o temp.html -F MKD_AUTOLINK "$file"
    cat res/template_header.html res/template_page.html temp.html res/template_footer.html > $filename.html
    tidy -config res/tidy_config.txt $filename.html
    rm temp.html
done
mkdir output/blog
mv pages/blog.html output/blog/index.html
mv pages/*.html output/
for file in posts/*; do
    filename="${file%.*}"
    markdown -o temp.html -F MKD_AUTOLINK "$file"
    cat res/template_header.html res/template_blog.html temp.html res/template_footer.html > $filename.html
    tidy -config res/tidy_config.txt $filename.html
    rm temp.html
done
mv posts/*.html output/blog/
echo "Script finished"