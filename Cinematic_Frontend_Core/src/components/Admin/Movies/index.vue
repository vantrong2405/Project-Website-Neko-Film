<template>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center"
      style="background-color: rgb(171, 130, 107); color: white;">
      <h3 class="align-middle mb-0 text-light ">
        <b>Quản Lý Phim</b>
      </h3>
      <button @click="loadLanguage(); loadAuthor(); loadCountry(); loadEmployee()" class="btn btn-outline-light "
        data-bs-toggle="modal" data-bs-target="#createModal">
        Thêm Mới Phim
      </button>
    </div>
    <div class="card-body text-end">


      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">STT</th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Tên Phim
              </th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Hình Ảnh
              </th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Ngày công
                chiếu</th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Ngôn Ngữ Gốc
              </th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Quốc Gia
              </th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Tác Giả</th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Người Tải
                Lên</th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Diễn Viên
              </th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Mô Tả</th>
              <th class="text-center text-nowrap" style="background-color: rgb(171, 130, 107); color: white;">Action</th>
            </tr>
          </thead>
          <tbody>
            <template v-for="(v, k) in list_movie">
              <tr>
                <td class="text-center align-middle">
                  {{ k + 1 }}
                </td>
                <td class="text-center align-middle">
                  {{ v.original_name }}
                </td>
                <td class="text-center align-middle">
                  <img v-bind:src="v.url" style="width: 100px; height: 100px;" />
                </td>
                <td class="text-center align-middle">
                  {{ v.date }}
                </td>
                <td class="text-center align-middle">
                  {{ v.language_name }}
                </td>
                <td class="text-center align-middle">
                  {{ v.country_name }}
                </td>
                <td class="text-center align-middle">
                  {{ v.author_name }}
                </td>
                <td class="text-center align-middle">
                  {{ v.user_name }}
                </td>
                <td class="text-center align-middle">
                  <i @click="getDataActor(v)" style="cursor: pointer;" data-bs-toggle="modal"
                    data-bs-target="#actorsModal" class="fa-sharp fa-solid fa-person fa-2x text-info"></i>
                </td>
                <td class="text-center align-middle">
                  <i @click="description = v.description" data-bs-toggle="modal" style="cursor: pointer;"
                    data-bs-target="#descriptionModal" class="fa-solid fa-circle-info fa-2x text-info"></i>
                </td>
                <td class="text-center text-nowrap align-middle">
                  <i @click="create_episode.id_movie = v.id; loadEpisode(v.id)" style="cursor: pointer;"
                    class="me-2 text-secondary fa-2x fa-solid fa-video text-success" data-bs-toggle="modal"
                    data-bs-target="#episodeModal"></i>
                  <i @click="Object.assign(update_information, v); update_information.date = formatDate(update_information.date); loadLanguage(); loadAuthor(); loadCountry(); loadEmployee()"
                    data-bs-toggle="modal" data-bs-target="#updateModal" style="cursor: pointer;"
                    class="me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                  <i @click="Object.assign(delete_information, v)" data-bs-toggle="modal" data-bs-target="#deleteModal"
                    class="fa-2x text-danger fa-solid fa-trash" style="cursor: pointer;"></i>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
        <div class="modal fade" id="actorsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="background-color: white">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                  <h4 class="text-secondary">Diễn Viên</h4>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row text-start">
                  <template v-for="(v, k) in list_actor_movie">
                    <div class="col-3 text-secondary">
                      <b>{{ v }}</b>
                      <p>{{ list_role[k] }}</p>
                    </div>
                  </template>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" style="background-color: white">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                  <h4 class="text-secondary">Cập Nhật Phim</h4>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <template v-if="status_u == 1">
                  <div class="row mb-2">
                    <div class="col-4">
                      <label class="form-label text-secondary">Tên Phim</label>
                      <input v-model="update_information.original_name" type="text" placeholder="Nhập Vào Tên phim"
                        class="form-control" />
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Ngày công chiếu</label>
                      <input v-model="update_information.date" class="form-control" type="date" />
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Đạo Diễn</label>
                      <select v-model="update_information.id_author" class="form-control">
                        <option value="0">Vui lòng chọn đạo diễn...</option>
                        <template v-for="( v, k ) in  list_author ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-4">
                      <label class="form-label text-secondary">Ngôn Ngữ</label>
                      <select v-model="update_information.id_language_original" class="form-control">
                        <option value="0">Vui lòng chọn ngôn ngữ...</option>
                        <template v-for="( v, k ) in  list_language ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Quốc Gia</label>
                      <select v-model="update_information.id_contries" class="form-control">
                        <option value="0">Vui lòng chọn quốc gia...</option>
                        <template v-for="( v, k ) in  list_country ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Nhân viên đang tạo</label>
                      <select v-model="update_information.id_user_upload" class="form-control">
                        <option value="0">Vui lòng chọn người tải...</option>
                        <template v-for="( v, k ) in  list_employee ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label class="form-label text-secondary">Hình Ảnh</label>
                      <input type="file" @change="handleFileUploaded('image')" ref="image" class="form-control" />
                    </div>
                  </div>
                  <div class="mb-1">
                    <label class="form-label text-secondary">Mô Tả</label>
                    <textarea v-model="update_information.description" class="form-control" placeholder="Mô tả phim..."
                      cols="30" rows="7"></textarea>
                  </div>
                </template>
                <template v-if="status_u == 2">
                  <div class="row">
                    <div class="col-7">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">
                                Vai Diễn
                              </th>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">Diễn Viên
                              </th>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <template v-for="( v, k ) in  list_actor_choosed ">
                              <tr>
                                <th class="text-center align-middle text-nowrap">{{ v.role }}</th>
                                <td class="align-middle text-nowrap text-center">{{ v.name }}</td>
                                <td class="text-center align-middle text-nowrap text-center">
                                  <button @click="deleteActorRels(v)" class="btn btn-danger ms-1">Xoá</button>
                                </td>
                              </tr>
                            </template>
                            <tr>
                              <td colspan="100%">
                                <div class="input-group">
                                  <input v-model="key_search" type="text" class="form-control" placeholder="Search..." />
                                  <button @click="search('actor')" class="input-group-text btn btn-secondary">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="text-center align-middle text-nowrap"><input v-model="create_actor_rels.role"
                                  type="text" class="form-control" placeholder="Vai diễn..."></th>
                              <td class="align-middle text-nowrap text-center">
                                <select v-model="create_actor_rels.id_actor" class="form-control">
                                  <option value="0">Vui lòng chọn diễn viên...</option>
                                  <template v-for="( v, k ) in  list_actor ">
                                    <option v-bind:value="v.id">{{ v.name }}</option>
                                  </template>
                                </select>
                              </td>
                              <td class="text-center align-middle text-nowrap text-center">
                                <button @click="createActorRels()" class="btn btn-success ms-1">Thêm Mới</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="card border-0">
                        <div class="card-header" style="background-color: #AB826B; color:white;">
                          <h4 class="text-start text-secondary">
                            <div class="mb-0">
                              <b style="color:white">Thêm Diễn Viên </b>
                            </div>
                          </h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <label class="text-secondary">Tên Diễn Viên</label>
                              <input type="text" placeholder="Tên diễn viên..." class="form-control"
                                v-model="create_actor.name">
                            </div>
                            <div class="col-md-12 mt-3">
                              <label class="text-secondary">Hình ảnh</label>
                              <input type="file" ref="image_actor" @change="handleFileUploaded('image_actor')"
                                class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="card-footer text-end">
                          <button class="btn btn-primary" v-on:click="createActor()">
                            Thêm Mới
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
                <template v-if="status_u == 3">
                  <div class="row">
                    <div class="col-5">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">
                                Thể loại
                              </th>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <template v-for="( v, k ) in  list_type_choosed ">
                              <tr>
                                <td class="align-middle text-nowrap text-center">{{ v.name }}</td>
                                <td class="text-center align-middle text-nowrap text-center">
                                  <button @click="deleteTypeRels(v)" class="btn btn-danger ms-1">Xoá</button>
                                </td>
                              </tr>
                            </template>
                            <tr>
                              <td colspan="100%">
                                <div class="input-group">
                                  <input v-model="key_search" type="text" class="form-control" placeholder="Search..." />
                                  <button @click="search('type')" class="input-group-text btn btn-secondary">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="align-middle text-nowrap text-center">
                                <select v-model="create_type_rels.id_type" class="form-control">
                                  <option value="0">Vui lòng chọn thể loại...</option>
                                  <template v-for="( v, k ) in  list_type ">
                                    <option v-bind:value="v.id">{{ v.name }}</option>
                                  </template>
                                </select>
                              </td>
                              <td class="text-center align-middle text-nowrap text-center">
                                <button @click="createTypeRels()" class="btn btn-success ms-1">Thêm Mới</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-header" style="background-color: #AB826B; color:white;">
                          <h3 class="text-light text-start fw-bold">Thêm Mới Thể Loại</h3>
                        </div>
                        <div class="card-body">
                          <label class="form-label text-dark">Tên Thể Loại</label>
                          <input type="text" class="form-control" placeholder="Tên thể loại..."
                            v-model="create_type.name">
                          <label class="form-label text-dark mt-3">Mô Tả</label>
                          <textarea type="text" class="form-control" placeholder="Mô tả..."
                            v-model="create_type.description"></textarea>
                        </div>
                        <div class="card-footer text-end">
                          <button class="btn btn-primary" @click="createType()">Thêm mới</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
              <div class="modal-footer">
                <button @click="status_u--; checkUpdate(update_information.id)" class="btn btn-secondary"
                  :disabled="status_u == 1 ? true : false">
                  <i class="fa-solid fa-2x fa-arrow-left"></i>
                </button>
                <button @click="status_u++; checkUpdate(update_information.id)" class="btn btn-secondary"
                  :disabled="status_u == 3 ? true : false">
                  <i class="fa-solid fa-2x fa-arrow-right"></i>
                </button>
                <button @click="createMovie()" class="btn btn-secondary"
                  :disabled="list_actor_choosed.length > 0 && list_type_choosed.length > 0 ? false : true">Cập
                  Nhật</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" style="background-color: white">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                  <h4 class="text-secondary">Thêm Mới Phim</h4>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <template v-if="status_c == 1">
                  <div class="row mb-2">
                    <div class="col-4">
                      <label class="form-label text-secondary">Tên Phim</label>
                      <input v-model="create_information.original_name" type="text" placeholder="Nhập Vào Tên phim"
                        class="form-control" />
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Ngày công chiếu</label>
                      <input v-model="create_information.date" class="form-control" type="date" />
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Đạo Diễn</label>
                      <select v-model="create_information.id_author" class="form-control">
                        <option value="0">Vui lòng chọn đạo diễn...</option>
                        <template v-for="( v, k ) in  list_author ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-4">
                      <label class="form-label text-secondary">Ngôn Ngữ</label>
                      <select v-model="create_information.id_language_original" class="form-control">
                        <option value="0">Vui lòng chọn ngôn ngữ...</option>
                        <template v-for="( v, k ) in  list_language ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Quốc Gia</label>
                      <select v-model="create_information.id_contries" class="form-control">
                        <option value="0">Vui lòng chọn quốc gia...</option>
                        <template v-for="( v, k ) in  list_country ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="form-label text-secondary">Nhân viên đang tạo</label>
                      <select v-model="create_information.id_user_upload" class="form-control">
                        <option value="0">Vui lòng chọn người tải...</option>
                        <template v-for="( v, k ) in  list_employee ">
                          <option v-bind:value="v.id">
                            {{ v.name }}
                          </option>
                        </template>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label class="form-label text-secondary">Hình Ảnh</label>
                      <input type="file" @change="handleFileUploaded('image')" ref="image" class="form-control" />
                    </div>
                  </div>
                  <div class="mb-1">
                    <label class="form-label text-secondary">Mô Tả</label>
                    <textarea v-model="create_information.description" class="form-control" placeholder="Mô tả phim..."
                      cols="30" rows="7"></textarea>
                  </div>
                </template>
                <template v-if="status_c == 2">
                  <div class="row">
                    <div class="col-7">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">
                                Vai Diễn
                              </th>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">Diễn Viên
                              </th>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <template v-for="( v, k ) in  list_actor_choosed ">
                              <tr>
                                <th class="text-center align-middle text-nowrap">{{ v.role }}</th>
                                <td class="align-middle text-nowrap text-center">{{ v.name }}</td>
                                <td class="text-center align-middle text-nowrap text-center">
                                  <button @click="deleteActorRels(v)" class="btn btn-danger ms-1">Xoá</button>
                                </td>
                              </tr>
                            </template>
                            <tr>
                              <td colspan="100%">
                                <div class="input-group">
                                  <input v-model="key_search" type="text" class="form-control" placeholder="Search..." />
                                  <button @click="search('actor')" class="input-group-text btn btn-secondary">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="text-center align-middle text-nowrap"><input v-model="create_actor_rels.role"
                                  type="text" class="form-control" placeholder="Vai diễn..."></th>
                              <td class="align-middle text-nowrap text-center">
                                <select v-model="create_actor_rels.id_actor" class="form-control">
                                  <option value="0">Vui lòng chọn diễn viên...</option>
                                  <template v-for="( v, k ) in  list_actor ">
                                    <option v-bind:value="v.id">{{ v.name }}</option>
                                  </template>
                                </select>
                              </td>
                              <td class="text-center align-middle text-nowrap text-center">
                                <button @click="createActorRels()" class="btn btn-success ms-1">Thêm Mới</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="card border-0">
                        <div class="card-header" style="background-color: #AB826B; color:white;">
                          <h4 class="text-start text-secondary">
                            <div class="mb-0">
                              <b style="color:white">Thêm Diễn Viên </b>
                            </div>
                          </h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <label class="text-secondary">Tên Diễn Viên</label>
                              <input type="text" placeholder="Tên diễn viên..." class="form-control"
                                v-model="create_actor.name">
                            </div>
                            <div class="col-md-12 mt-3">
                              <label class="text-secondary">Hình ảnh</label>
                              <input type="file" ref="image_actor" @change="handleFileUploaded('image_actor')"
                                class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="card-footer text-end">
                          <button class="btn btn-primary" v-on:click="createActor()">
                            Thêm Mới
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
                <template v-if="status_c == 3">
                  <div class="row">
                    <div class="col-5">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">
                                Thể loại
                              </th>
                              <th class="text-center align-middle text-nowrap"
                                style="background-color: #AB826B; color:white;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <template v-for="( v, k ) in  list_type_choosed ">
                              <tr>
                                <td class="align-middle text-nowrap text-center">{{ v.name }}</td>
                                <td class="text-center align-middle text-nowrap text-center">
                                  <button @click="deleteTypeRels(v)" class="btn btn-danger ms-1">Xoá</button>
                                </td>
                              </tr>
                            </template>
                            <tr>
                              <td colspan="100%">
                                <div class="input-group">
                                  <input v-model="key_search" type="text" class="form-control" placeholder="Search..." />
                                  <button @click="search('type')" class="input-group-text btn btn-secondary">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="align-middle text-nowrap text-center">
                                <select v-model="create_type_rels.id_type" class="form-control">
                                  <option value="0">Vui lòng chọn thể loại...</option>
                                  <template v-for="( v, k ) in  list_type ">
                                    <option v-bind:value="v.id">{{ v.name }}</option>
                                  </template>
                                </select>
                              </td>
                              <td class="text-center align-middle text-nowrap text-center">
                                <button @click="createTypeRels()" class="btn btn-success ms-1">Thêm Mới</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-header" style="background-color: #AB826B; color:white;">
                          <h3 class="text-light text-start fw-bold">Thêm Mới Thể Loại</h3>
                        </div>
                        <div class="card-body">
                          <label class="form-label text-dark">Tên Thể Loại</label>
                          <input type="text" class="form-control" placeholder="Tên thể loại..."
                            v-model="create_type.name">
                          <label class="form-label text-dark mt-3">Mô Tả</label>
                          <textarea type="text" class="form-control" placeholder="Mô tả..."
                            v-model="create_type.description"></textarea>
                        </div>
                        <div class="card-footer text-end">
                          <button class="btn btn-primary" @click="createType()">Thêm mới</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
              <div class="modal-footer">
                <button @click="status_c--; checkCreate()" class="btn btn-secondary"
                  :disabled="status_c == 1 ? true : false">
                  <i class="fa-solid fa-2x fa-arrow-left"></i>
                </button>
                <button @click="status_c++; checkCreate()" class="btn btn-secondary"
                  :disabled="status_c == 3 ? true : false">
                  <i class="fa-solid fa-2x fa-arrow-right"></i>
                </button>
                <button @click="createMovie()" class="btn btn-secondary"
                  :disabled="list_actor_choosed.length > 0 && list_type_choosed.length > 0 ? false : true">Thêm
                  mới</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" style="background-color: white">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                  <h4 class="text-secondary">Mô Tả Phim</h4>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                <textarea v-bind:value="description" disabled cols="30" rows="10" class="form-control"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Xóa Phim</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                  <div class="d-flex align-items-center">
                    <div class="font-35 text-dark"><i class="bx bx-info-circle"></i></div>
                    <div class="ms-3">
                      <div class="text-dark text-start">
                        <p>Bạn có muốn xóa thể loại <b>{{ delete_information.original_name }}</b> này không? </p>
                        <p><b>Lưu ý:</b> Điều này không thể hoàn tác! </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                  v-on:click="deleteMovie()">Xóa</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="episodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="mb-0 text-center align-middle" style="color: #AB826B;"><b>DANH SÁCH TẬP PHIM</b></h3>
                <button type="button" class="btn-close mt-1" style="transform: translateX(-10px)" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="card" style="border-bottom: 5px solid  #AB826B;">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th class="text-center align-middle text-nowrap"
                                  style="background-color: #AB826B; color:white;">
                                  Tập Số
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                  style="background-color: #AB826B; color:white;">Path
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                  style="background-color: #AB826B; color:white;">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <template v-for="( v, k ) in  list_episode ">
                                <tr>
                                  <th class="text-center align-middle text-nowrap">{{ k + 1 }}</th>
                                  <td class="align-middle text-nowrap text-center">{{ v.url }}</td>
                                  <td class="text-center align-middle text-nowrap text-center">
                                    <button @click="updateMovie(v)" class="btn btn-danger">Cập Nhật</button>
                                    <button class="btn btn-success ms-1" data-bs-toggle="modal">Xoá</button>
                                  </td>
                                </tr>
                              </template>
                              <tr>
                                <th class="text-center align-middle text-nowrap"><input v-model="create_episode.num_eps"
                                    type="text" class="form-control"></th>
                                <td class="align-middle text-nowrap text-center"><input
                                    @change="handleFileUploaded('video')" ref="video" type="file" class="form-control">
                                </td>
                                <td class="text-center align-middle text-nowrap text-center">
                                  <button @click="createEpisode()" class="btn btn-success ms-1">Thêm
                                    Mới</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
import MasterRocker from "../../../layout/wrapper/MasterRocker.vue";
const toaster = createToaster({ position: "top-right" });
export default {
  data() {
    return {
      create_type: {},
      create_type_rels: { 'id_type': 0 },
      create_actor: {},
      create_actor_rels: { 'id_actor': 0 },
      key_search: '',
      description: '',
      create_episode: {},
      status_c: 1, // Nếu bằng 0 là đang thêm mới thông tin phim, 1 là diễn viên va 2 là thể loại
      status_u: 1, // Nếu bằng 0 là đang thêm mới thông tin phim, 1 là diễn viên va 2 là thể loại
      list_employee: [],
      list_author: [],
      list_language: [],
      list_actor: [],
      list_actor_choosed: [],
      list_movie: [],
      list_country: [],
      list_episode: [],
      list_type: [],
      list_type_choosed: [],
      list_actor_movie: [],
      list_role: [],
      create_information: {
        'id_contries': 0,
        'id_author': 0,
        'id_user_upload': 0,
        'id_language_original': 0,
        'actor': [],
        'type': []
      },
      update_information: {},
      delete_information: {},
    };
  },
  mounted() {
    this.loadMovie();
    this.loadType();
    this.loadActor();
  },
  methods: {
    async updateMovie(v) {

      await axios
        .post('http://127.0.0.1:8000/api/admin/movie/update', this.update_information)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.loadOneMovie(v);
          }
          else {
            console.log("tao la v ne : ");
            console.log(v);
            toaster.error('ERROR<br>' + res.data.message);
          }
        });
    },

    loadOneMovie(v) {
      var send_data = { 'id_movie': v.id };
      axios
        .post('http://127.0.0.1:8000/api/admin/movie/get-one-movie', send_data)
        .then((res) => {
          if (res.data.status) {
            v = res.data.data;
          }
        });
    },

    getDataActor(v) {
      this.list_actor_movie = v.actors.split(',');
      this.list_role = v.roles.split(',');
    },

    deleteMovie() {
      axios
        .post('http://127.0.0.1:8000/api/admin/movie/delete', this.delete_information)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.loadMovie();
          }
          else toaster.error('ERROR<br>' + res.data.message);
        })
    },

    createType() {
      axios
        .post('http://127.0.0.1:8000/api/admin/type/create', this.create_type)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.create_type = {};
            this.search('type');
          }
          else toaster.error('ERROR<br>' + res.data.message);
        })
    },

    createTypeRels() {
      axios
        .post('http://127.0.0.1:8000/api/admin/type-rel/create', this.create_type_rels)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.loadTypeChoosed(0);
          }
          else toaster.error('ERROR<br>' + res.data.message);
        })
    },

    deleteTypeRels(v) {
      axios
        .post('http://127.0.0.1:8000/api/admin/type-rel/delete', v)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.loadTypeChoosed(0);
          }
          else toaster.error('ERROR<br>' + res.data.message);
        })
    },

    deleteActorRels(v) {
      axios
        .post('http://127.0.0.1:8000/api/admin/actor-rel/delete', v)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.loadActorChoosed(0);
          }
          else toaster.error('ERROR<br>' + res.data.message);
        })
    },

    checkCreate() {
      if (this.status_c === 2) {
        this.loadActorChoosed(0);
      } else if (this.status_c === 3) {
        this.loadTypeChoosed(0);
      }
    },

    checkUpdate(id) {
      if (this.status_u === 2) {
        this.loadActorChoosed(id);
      } else if (this.status_u === 3) {
        this.loadTypeChoosed(id);
      }
    },

    async createActor() {
      if (this.create_actor.file) {
        await this.upFile(this.create_actor, this.create_actor.name);
        axios
          .post('http://127.0.0.1:8000/api/admin/actor/create', this.create_actor)
          .then((res) => {
            if (res.data.status) {
              toaster.success('SUCCESS<br>' + res.data.message);
              this.create_actor = {};
              this.search('actor');
            }
            else toaster.error('ERROR<br>' + res.data.message);
          })
      } else toaster.error('ERROR<br>' + 'File chưa được nhập');

    },

    createActorRels() {
      axios
        .post('http://127.0.0.1:8000/api/admin/actor-rel/create', this.create_actor_rels)
        .then((res) => {
          if (res.data.status) {
            toaster.success('SUCCESS<br>' + res.data.message);
            this.loadActorChoosed(0);
            this.create_actor_rels = {};
          }
          else toaster.error('ERROR<br>' + res.data.message);
        })
    },

    search(type) {
      var send_data = { 'key': this.key_search }
      if (type === 'actor') {
        axios
          .post('http://127.0.0.1:8000/api/admin/actor/search', send_data)
          .then((res) => {
            this.list_actor = res.data.data;
            this.key_search = '';
          });
      } else {
        axios
          .post('http://127.0.0.1:8000/api/admin/type/search', send_data)
          .then((res) => {
            this.list_type = res.data.data;
            this.key_search = '';
          });
      }
    },

    async createEpisode() {
      if (this.create_episode.file) {
        await this.upFile(this.create_episode, 'Tập ' + this.create_episode.num_eps);
        if (this.create_episode.filename) {
          axios
            .post('http://127.0.0.1:8000/api/admin/episode/create', this.create_episode)
            .then((res) => {
              if (res.data.status) {
                toaster.success('SUCCESS<br>' + res.data.message);
                this.loadEpisode(this.create_episode.id_movie);
              }
              else toaster.error('ERROR<br>' + res.data.message);
            });
        }
      } else toaster.error('ERROR<br>' + 'File chưa được nhập');

    },

    async createMovie() {
      if (this.create_information.file) {
        await this.upFile(this.create_information, this.create_information.original_name);
      } else toaster.error('ERROR<br>' + 'File chưa được nhập');
      if (this.create_information.filename) {
        await axios
          .post('http://127.0.0.1:8000/api/admin/movie/create', this.create_information)
          .then((res) => {
            if (res.data.status) {
              toaster.success('SUCCESS<br>' + res.data.message);
              this.create_information = {};
              this.loadMovie();
              MasterRocker.methods.hideModal('createModal');
            }
            else toaster.error('ERROR<br>' + res.data.message);
          })
      }
    },

    async upFile(value, name) {
      var formData = new FormData();
      if (value.id_movie) formData.append("id_movie", value.id_movie);
      formData.append("name", name);
      formData.append("file", value.file);
      await axios({
        method: "post",
        url: "http://127.0.0.1:8000/api/admin/up-file",
        data: formData,
        headers: {
          "Content-Type": "multipart/form-data",
        },
      }).then((res) => {
        if (res.data.status) value.filename = res.data.filename;
        else toaster.error('ERROR<br>' + res.data.message);
      });
    },

    loadActor() {
      axios
        .post('http://127.0.0.1:8000/api/admin/actor/get-data')
        .then((res) => {
          this.list_actor = res.data.data;
        })
    },

    loadType() {
      axios
        .post('http://127.0.0.1:8000/api/admin/type/get-data')
        .then((res) => {
          this.list_type = res.data.data;
        })
    },

    loadTypeChoosed(id) {
      var send_data = { 'id_movie': id }
      axios
        .post('http://127.0.0.1:8000/api/admin/type-rel/get-data-choosed', send_data)
        .then((res) => {
          this.list_type_choosed = res.data.data;
        })
    },

    loadEpisode(id) {
      var send_data = { 'id_movie': id };
      axios
        .post('http://127.0.0.1:8000/api/admin/episode/get-data', send_data)
        .then((res) => {
          this.list_episode = res.data.data;
        })
    },

    loadAuthor() {
      axios
        .post('http://127.0.0.1:8000/api/admin/author/get-data')
        .then((res) => {
          this.list_author = res.data.data;
        })
    },

    loadLanguage() {
      axios
        .post('http://127.0.0.1:8000/api/admin/language/get-data')
        .then((res) => {
          this.list_language = res.data.data;
        })
    },

    loadCountry() {
      axios
        .post('http://127.0.0.1:8000/api/admin/country/get-data')
        .then((res) => {
          this.list_country = res.data.data;
        })
    },

    loadActorChoosed(id) {
      var send_data = { 'id_movie': id }
      axios
        .post('http://127.0.0.1:8000/api/admin/actor-rel/get-data-choosed', send_data)
        .then((res) => {
          this.list_actor_choosed = res.data.data;
        })
    },

    loadEmployee() {
      axios
        .post('http://127.0.0.1:8000/api/admin/employee/get-data')
        .then((res) => {
          this.list_employee = res.data.data;
        })
    },

    loadMovie() {
      axios
        .post('http://127.0.0.1:8000/api/admin/movie/get-data')
        .then((res) => {
          this.list_movie = res.data.data;
        })
    },

    formatDate(inputDate) {
      var parts = inputDate.split('/');
      var formattedDate = parts[2] + '-' + parts[1] + '-' + parts[0];
      return formattedDate;
    },

    handleFileUploaded(type) {
      if (type === 'image') this.create_information.file = this.$refs.image.files[0];
      else if (type === 'image_actor') this.create_actor.file = this.$refs.image_actor.files[0];
      else this.create_episode.file = this.$refs.video.files[0];
    },
  },
};
</script>
<style></style>
