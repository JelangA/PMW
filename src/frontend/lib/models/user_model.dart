class UserModel {
  int? code, id;
  String? status, message, nim, name, email, major, programStudy, createdAt, updatedAt;

  UserModel({
    required this.code,
    required this.status,
    required this.message,
    required this.id,
    required this.nim,
    required this.name,
    required this.email,
    required this.major,
    required this.programStudy,
    required this.createdAt,
    required this.updatedAt,
  });

  factory UserModel.fromJson(Map<String, dynamic> object) {
    var metadata = object['metadata'];
    var data = object['data'];
    var student = object['data']['student'];

    return UserModel(
      code: metadata['code'],
      status: metadata['status'],
      message: metadata['message'],
      id: data['id'],
      nim: data['nim'],
      name: data['name'],
      email: data['email'],
      major: student['major'],
      programStudy: student['study_program'],
      createdAt: data['created_at'],
      updatedAt: data['updated_at'],
    );
  }
}
