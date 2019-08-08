<?php


function convertStatus($item)
{
    if ($item == 1) {
        echo 'Kích hoạt';
    } else {
        echo 'Đóng';
    }
}

function showCategories($data, $parent_id = 0, $char = '')
{
    foreach ($data as $key => $item) {
        if ($item['parent_id'] == $parent_id) {
            echo '<option value="' . $item['id'] . '">';
            echo $char . $item['title'];
            echo '</option>';
            unset($data[$key]);
            showCategories($data, $item['id'], $char . '---  ');
        }
    }
}

//menu
function menuParent($data_menu, $parent_id = 0, $char = '')
{
    foreach ($data_menu as $key => $item) {
        if ($item['parent_id'] == $parent_id) {
            echo '<ul class="col-md-12 parent' . $char . '">
                        <li class="form-group has-success has-feedback">
                            <input type="text" id="inputSuccess2" value="' . $item['name'] . '" class="form-control inputSuccess2">
                            <ul class="form-control-feedback">
                                <li class="destroy"><a href="' . route('destroy.delete', $item['id']) . '"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="' . route('menu.edit', $item['id']) . '" class="glyphicon glyphicon-pencil edit"></a></li>
                            </ul>
                        </li>
                    </ul>';
            unset($data_menu[$key]);
            menuParent($data_menu, $item['id'], $char . ' menu-1');
        }
    }
}


function star($star)
{
    if ($star == 5) {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>';
    } elseif ($star == 4) {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>';
    } elseif ($star == 3) {
            echo '<i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>';
    } elseif ($star == 2) {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>';
    } else {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>';
    }
}
