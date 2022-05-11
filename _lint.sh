export DIFF_FILES=$(git diff --name-only --diff-filter=ACM $(git merge-base HEAD origin/master) | grep ".php")
if [[ ! -z $DIFF_FILES ]]
then
    echo "Checking ..." $DIFF_FILES
    echo "Autofix ..."
    vendor/bin/phpcbf --ignore=tests/*,vendor/* $DIFF_FILES
    echo "Get unfixable code ..."
    vendor/bin/phpcs --report=emacs --ignore=tests/*,vendor/* $DIFF_FILES
    echo "error code : "$?
fi
