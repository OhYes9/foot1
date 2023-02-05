<?php

      session_start(); /* За­пус­ка­ем сес­сию */
      include("connect.php"); /* Свя­зыва­ем­ся с БД */
  $error = ""; /* Пе­ремен­ная для тек­ста оши­бок */

  if (isset($_POST['login']))
{
          $login = $_POST['login'];
      if ($login == '')
      {
              unset($login);
              $error .= "Вы не вве­ли ло­гин<br>";
      }
}


if (isset($_POST['password']))
{
      $password = $_POST['password'];
      if ($password =='')
      {
              unset($password);
              $error .= "Вы не вве­ли па­роль";
      }
}

if (empty($error))
{
    $rez = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
    //из­вле­ка­ем из ба­зы все дан­ные о пользо­вате­ле с вве­ден­ным ло­гином 
    $mytable = mysqli_fetch_array($rez);

    if ($mytable['login'] == $login) /* ес­ли ло­гин сов­па­да­ет */
    {    
        if ($mytable['password'] == $password) /* ес­ли па­роль сов­па­да­ет */    
        {    
              $_SESSION['login'] = $mytable['login']; /*За­писы­ва­ем в сес­сию дан­ные
        ло­гина*/    
              $_SESSION['id'] = $mytable['id']; /* иден­ти­фика­тора */    
              $_SESSION['username'] = $mytable['username']; /* име­ни пользо­вате­ля */   
              $_SESSION['role'] = $mytable['role']; /* роль пользователя */ 
          }    
          else    
          {    
            $error .= "Вы вве­ли неп­ра­вильный па­роль.
       <a href='../index.php'>На глав­ную</a>";    
          }    
          }    
         else    
         {    
               $error .= "Вы вве­ли неп­ра­вильный ло­гин.
    <a href='../index.php'>На глав­ную</a>";    
              }
              if(!empty($error))
{
      echo $error;
}
if (!empty($_SESSION['login']))
{
      header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
}
}