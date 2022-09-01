#sudo mkdir /opt/lampp/htdocs/board
#sudo mkdir /opt/lampp/htdocs/_inc

echo 'delete /opt/lampp/htdocs folder...'
sudo rm -rf /opt/lampp/htdocs/

echo 'copying htdocs...'
sudo cp -r ./htdocs /opt/lampp/htdocs/

echo 'DONE!'
