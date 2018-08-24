<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3><a style="color:yellow" href="<?php echo e(url('/')); ?>">Visit Site</a></h3>
        <ul class="nav side-menu">

            <li><a><i class="fa fa-book"></i> Course <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                <li><a href="<?php echo e(url('course')); ?>">List Courses</a></li>
                        
                </ul>
            </li>

            <?php /* <li><a><i class="fa fa-book"></i> Chapters <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                <li>
                        <a href="<?php echo e(url('chapters/')); ?>">List Chapters</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('chapters/create')); ?>">Create Chapters</a>
                    </li>

                </ul>
            </li> */ ?>
            <li><a><i class="fa fa-book"></i> Exams <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                <li><a href="<?php echo e(url('exams')); ?>">List Exams</a></li>
                        
                </ul>
            </li>
             <?php /* <li><a><i class="fa fa-book"></i> Questions <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                <li>
                        <a href="<?php echo e(url('question/')); ?>">List Questions</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(url('questions/generate')); ?>">Generate Questions</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('questions/past')); ?>">Past Questions</a>
                    </li>

                </ul>
            </li> */ ?>
            
            <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo e(url('users')); ?>">
                  Users Lists
                  </a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-unlock"></i> Roles <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo e(url('roles')); ?>">
                Role Lists
                  </a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>

</div>