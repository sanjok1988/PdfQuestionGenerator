 <?php $__env->startSection('title','Questions | Lists'); ?> <?php $__env->startSection('content'); ?>

<div class="x_content">

	<div id="posts">
		
		<h1>Exam : <?php echo e($exam_id); ?> : Semester : <?php echo e($semester); ?> : course_code <?php echo e($course_code); ?></h1>

    <a href="<?php echo e(url('question/help')); ?>"><h6>Help: Types Of Questions</h6></a>
<hr>

<a href="<?php echo e(url('questions/generate/export?exam_id='.$exam_id.'&semester='.$semester.'&course_code='.$course_code)); ?>">Export To PDF</a>

<hr>
			
		

	<div class="row">
		<div class="col-md-12">


	</div>
		

		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=8%>SN</th>
					
					<th>Questions</th>
                    <th width=10%>Assigned Mark</th>
					<th width="10%">Difficulty Level</th>
                    <th width="10%">Question Type</th>
					<th>Chapters</th>
					<th width="15%">Action</th>

				</tr>
			</thead>
			<tbody>
            <?php $i=1;?>
            <?php foreach($q as $post): ?>
				<tr>
					<td ><?php echo $i++;?></td>
					<td >
						<?php echo $post->question;?>
					</td>
					
						<td ><?php echo e($post->assigned_mark); ?></td>
						<td ><?php echo e($post->difficulty_level); ?></td>
                        <td ><?php echo e($post->question_type); ?></td>

						<td ><div style="word-wrap: break-word"><?php echo e($post->chapter_id); ?></div></td>
						
						<td >
<a href="<?php echo e(url('questions/generate/destroy?qid='.$post->qid)); ?>" title="Delete Question" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i></a>

						</td>
				</tr>
                <?php endforeach; ?>
			</tbody>
		</table>

		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts::app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>