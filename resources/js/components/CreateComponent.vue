<!--Component màn hình Thêm thông tin-->
<template>
    <div class="create">
        <h1>Tạo mới dữ liệu học sinh</h1>
        <div class="component-cotainer">
            <form @submit.prevent="addStudent">
                <!--Danh sách lỗi validate-->
                <p v-if="errors.length">
                    <b id="content">Vui lòng hoàn thành các yêu cầu sau:</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_code">Mã học sinh</label>
                            <input id="student_code" name="student_code" type="text" class="form-control" v-model="student.student_code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_code">Tên học sinh</label>
                            <input id="student_name" name="student_name" type="text" class="form-control" v-model="student.student_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select id="gender" class="form-control" v-model="student.gender">
                                <option selected = "selected" value = "0" name="Nam">Nam</option>
                                <option value = "1" name="Nữ">Nữ</option>
                                <option value = "2" name="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Lớp</label>
                            <select id="grade" class="form-control" v-model="student.grade">
                                <option selected = "selected" value = "0">10</option>
                                <option value = "1">11</option>
                                <option value = "2">12</option>
                            </select>
                        </div>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" v-model="student.address" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="student.email">
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>GPA</label>
                            <input min="0" max="4" step="1" type="number" class="form-control" v-model="student.GPA">
                        </div>
                    </div>
                </div><br />
                <div class="form-group">
                    <button class="btn btn-primary">Tạo mới</button>
                    <button class="btn btn-danger" @click.prevent="cancelForm">Hủy bỏ</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
    .create {
        background-color: white;
        border-radius: 5px;
        padding: 1px 10px 10px 10px;
    }
    .component-cotainer {
        border: 1px solid black;
        border-radius: 5px;
        padding: 5px 0px 0px 10px;
    }
    ul, b {
        color: red;
    }
    input:active, select:active, textarea:active {
        background-color: #ACAFB3;
        color: white;
    }
    input:focus, select:focus, textarea:focus {
        background-color: #ACAFB3;
        color: white;
    }
    input:hover, select:hover, textarea:hover {
        background-color: #ACAFB3;
        color: white;
    }
</style>

<script>
    export default {
        data() {
            return {
                student:{
                    student_code: null,
                    student_name: null,
                    gender: 0,
                    grade: 0,
                    address: null,
                    email: null,
                    GPA: null,
                },
                errors: []
            }
        },
        methods: {
            //Hàm thêm dữ liệu
            addStudent: function(e) {
                //Validate trống
                this.errors = [];
                if (!this.student.student_code) {
                    this.errors.push('Không bỏ trống mã học sinh');
                    document.getElementById('student_code').style.borderColor = "red";
                } else {
                    document.getElementById('student_code').style.borderColor = "black";
                }
                if (!this.student.student_name) {
                    this.errors.push('Không bỏ trống tên học sinh');
                    document.getElementById('student_name').style.borderColor = "red";
                } else {
                    document.getElementById('student_code').style.borderColor = "black";
                }
                e.preventDefault();

                if(this.errors.length == 0){
                    let uri = 'http://localhost:8000/api/list/create';
                    this.axios.post(uri, this.student).then((response) => {
                    this.$router.push({name: 'lists'});
                    }).catch(() => {
                        alert('Mã học sinh đã tồn tại! Vui lòng nhập mã khác!');
                        document.getElementById('student_code').style.borderColor = "red";
                    });
                }
            },
            //Thoát form thêm mới
            cancelForm: function(e) {
                if(confirm("Bạn có muốn thoát thao tác?")){
                    this.show = false;
                    this.$router.push({ name: 'lists' });
                }
            }
        }
    }
</script>