Vue.config.devtools = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
var vm = new Vue({
	el: "#posts",

	data: {
		posts: [],
		checked:[],
		image: '',
		file: '',
		newPost: {
			'id': '',
			'name':'',
			'display_name': '',
			'description': '',

		},
		updatePost: {
			'id': '',
			'name':'',
			'display_name': '',
			'description': '',

		},
		permission:{
			'id':'',
			'name':'',
			'display_name':'',
			'description':''
		},
		pagination: {
			total: 0,
			per_page: 2,
			from: 1,
			to: 0,
			current_page: 1
		},
		offset: 4,
		formErrors: {},
		formErrorsUpdate: {},
		order:null
	},
	computed: {

		isActived: function () {
			return this.pagination.current_page;
		},
		pagesNumber: function () {
			if (!this.pagination.to) {
				return [];
			}
			var from = this.pagination.current_page - this.offset;
			if (from < 1) {
				from = 1;
			}
			var to = from + (this.offset * 2);
			if (to >= this.pagination.last_page) {
				to = this.pagination.last_page;
			}
			var pagesArray = [];
			while (from <= to) {
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
		}
	},
	mounted() {

		this.fetch(this.pagination.current_page);

	},
	methods: {

		fetch(page) {
			this.$http.get('roles/list?page=' + page).then((response) => {
				this.posts = response.data.data.data;
				this.pagination = response.data.pagination;
				this.permission = response.data.permission;
			});
		},
		add: function () {
			$("#addModal").modal('show');
			this.newPost = {};
		},
		store: function () {
			var data = new FormData(document.getElementById("create"));

			this.$http.post('roles/store', data).then((response) => {
				this.changePage(this.pagination.current_page);
				var push = this.posts.push(this.newPost);
				$("#addModal").modal('hide');
				this.newPost = '';
				this.image = '';
				toastr.success('Created Successfully.', 'Success Alert', {
					timeOut: 5000
				});
			}, (response) => {
				this.formErrors = response.data;
			})
		},
		update: function () {
			var data = new FormData(document.getElementById("update"));
			data.append('file', this.file);
			this.$http.post('roles/update', data).then((response) => {
				this.changePage(this.pagination.current_page);
				var push = this.posts.push(this.updatePost);

				$("#updateModal").modal('hide');
				this.newPost.id = '';
				this.image = '';
				toastr.success('Updated Successfully.', 'Success Alert', {
					timeOut: 5000
				});
			}, (response) => {
				this.formErrors = response.data;
			})
		},
		edit: function (post) {
			this.$http.post('roles/getRolePermissions/'+ post.id).then((response)=>{
				this.checked = Object.keys(response.data).map(function(k) { return response.data[k] });

			});

			this.updatePost.name = post.name;
			this.updatePost.description = post.description;
			this.updatePost.display_name = post.display_name;
			this.updatePost.id = post.id;
	
			$('#updateModal').modal('show');
		},
		destroy: function (post) {
			this.$http.post('roles/delete/' + post.id).then((response) => {
				var index = this.posts.indexOf(post);
				this.posts.splice(index, 1);
				toastr.success('Deleted Successfully.', 'Success Alert', {
					timeOut: 5000
				});
			});
		},

		changePage: function (page) {
			this.pagination.current_page = page;
			this.fetch(page);
		},

	}
});
