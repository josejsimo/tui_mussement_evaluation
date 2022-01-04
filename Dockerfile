FROM php:7.4-cli
COPY . /usr/src/tui_mussement_evaluation
WORKDIR /usr/src/tui_mussement_evaluation
CMD [ "php", "./run.php" ]
