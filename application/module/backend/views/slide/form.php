<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
            $module     = $this->arrParam['module'];    
            require_once PATH_MODULE . $module .DS. 'views' .DS. 'head-form.php';

            $inputID = '';
            $rowID   = '';
            $picture = '';
            if(isset($this->arrParam['id'])){
                $action .= '&id='.$this->arrParam['id'];
                $inputID            = Helper::cmsInput('hidden', 'form[id]', 'form[id]', 'form-control form-control-sm', $dataForm['id'], null, null, 'readonly');
                $picture            = '<img src="'.URL_UPLOAD . $controller . DS . '300x124-' . $dataForm['picture'].'">';
                $inputHiddenPicture = Helper::cmsInput('hidden', 'form[hidden_picture]', 'hidden_picture', 'form-control form-control-sm', $dataForm['picture'], null, null);
            }

            // Input
            $inputDescription          = Helper::cmsInput('text', 'form[description]', 'form[description]', 'form-control form-control-sm', $dataForm['description']);

            // Row
            $rowDescription           = Helper::cmsRowForm('Description', $inputDescription, false, 'description', 'col-sm-2 col-form-label text-sm-right');
            $rowLink           = Helper::cmsRowForm('Link', $inputLink, false, 'link', 'col-sm-2 col-form-label text-sm-right');
            $rowPicture        = Helper::cmsRowForm('Choose Picture', $inputPicture . $picture . $inputHiddenPicture, false, 'picture', 'col-sm-2 col-form-label text-sm-right');
            // Link Button
            $linkSave          = URL::createLink($module, $controller, $action, ['type' => 'save']);
            $linkSavedAndNew   = URL::createLink($module, $controller, $action, ['type' => 'save-new']);
            $linkSavedAndClose = URL::createLink($module, $controller, $action, ['type' => 'save-close']);
            $linkCancel        = URL::createLink($module, $controller, 'index');
            // Button
            $btnSave           = Helper::cmsButton('noIcon', 'Save', null, null, 'btn btn-sm btn-success mr-1', $linkSave);
            $btnSavedAndNew    = Helper::cmsButton('noIcon', 'Save & New', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndNew);
            $btnSavedAndClose  = Helper::cmsButton('noIcon', 'Save & Close', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndClose);
            $btnCancel         = Helper::cmsButton('noIcon', 'Cancel', null, null, 'btn btn-sm btn-danger mr-1', $linkCancel);
        
            $rows = $rowName . $rowDescription . $rowLink . $rowStatus . $rowOrdering . $rowPicture;
        ?>

        <form action="#" method="post" class="mb-0" id="admin-form" enctype="multipart/form-data">
            <div class="card card-info card-outline">

                <div class="card-body">
                    <?php echo $rows . $inputToken . $inputID; ?>
                </div>

                <div class="card-footer">
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <?php echo $btnSave . $btnSavedAndNew . $btnSavedAndClose . $btnCancel ;?>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- /.content -->