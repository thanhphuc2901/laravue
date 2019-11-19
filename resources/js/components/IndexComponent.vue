<!--Component của màn hình danh sách-->
<template>
    <div class="main">
        <h2>Danh sách học sinh</h2>
            <div class="row">
                <div class="col-md-11">
                    <form class="navbar-form navbar-left" action="/action_page.php">
                        <label class="btn btn-default fill">Tiêu chí tìm kiếm</label>
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="searchQuerry" placeholder="Nhập mã/tên học sinh">
                        </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <router-link :to="{ name: 'create' }" class="btn btn-primary btn-create">Tạo mới</router-link>
                </div>
            </div><br />
        <div class="table-container overflow-auto">
            <table class="table table-hover list-student-table" id="student-table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên học sinh</th>
                        <th>Giới tính</th>
                        <th>Lớp</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>GPA</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in listStudent" :key="student.id">
                        <td>{{ student.student_code }}</td>
                        <td>{{ student.student_name }}</td>
                        <td><span v-if="student.gender == 0">Nam</span>
                            <span v-if="student.gender == 1">Nữ</span>
                            <span v-if="student.gender == 2">Khác</span>
                        </td>
                        <td>
                            <span v-if="student.grade == 0">10</span>
                            <span v-if="student.grade == 1">11</span>
                            <span v-if="student.grade == 2">12</span>
                        </td>

                        <td>{{ student.address }}</td>
                        <td>{{ student.email }}</td>
                        <td>{{ student.GPA }}</td>
                        <td><router-link :to="{name: 'edit', params: { id: student.id }}" class="btn btn-primary glyphicon glyphicon-edit"></router-link>&nbsp;<button type="button" class="btn btn-danger glyphicon glyphicon-trash" @click.prevent="deleteStudent(student.id)"></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="paginate">
            <pagination :data="lists" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    th, td {
        text-align: center;
    }
    th {
        border-bottom: 1px solid black !important;
    }
    td {
        vertical-align: middle !important;
    }
    h2 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    thead {
        background-color: #4CAF50;
    }
    .table-container {
        border: 1px solid black;
        border-radius: 5px;
    }
    .main {
        background-color: white;
        border-radius: 5px;
    }
    .fill, .btn-search {
        background-color: #4CAF50;
        color: #fff;
        border: none;
    }
    .btn-search:hover {
        background-color: lightgreen;
    }
    .btn-create {
        margin: 8px 0px 0px 0px;
    }
    .paginate {
        text-align: center;
    }
</style>

<script>
    export default {
        data() {
            return {
                page: 1,
                searchQuerry: '',
                lists: {},
            }
        },
        created() {
            //////////////////////
            // let uri = 'http://localhost:8000/api/lists';
            // this.axios.get(uri).then(response => {
            //     this.lists = response.data;
            // });
            this.getResults();
        },
        methods: {
            //Hàm xóa row trên giao diện
            deleteStudent(id) {
                if(confirm("Bạn có chắc chắn muốn xóa bản ghi này?")){
                    let uri = `http://localhost:8000/api/list/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                    this.lists.splice(this.lists.indexOf(id), 1);
                });
                }
            },
            //Hàm phân trang
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }    
                this.$http.get('/api/lists?page=' + page)
                    .then(response => {
                        return response.data;
                    }).then(data => {
                        console.log(data);
                        this.lists = data;
                    });
            }
        },
        computed: {
            listStudent() {
                console.log(this.searchQuerry);
                if(this.searchQuerry) {
                    return this.lists.data.filter((student) => {
                        return student.student_name.toLowerCase().indexOf(this.searchQuerry.toLowerCase())>=0;
                    })
                } else {
                    return this.lists.data;
                }
            },
            rows() {
                return this.listStudent.length
            }
        } 
    }
</script>