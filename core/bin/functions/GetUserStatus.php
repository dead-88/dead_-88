<?php

function GetUserStatus($time) {
  if($time >= (time() - (60*5))) {
      return 'connect.png';
  } else {
      return 'disconnect.png';
  }
}