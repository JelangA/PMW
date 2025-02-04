class UserModel {
  int? id;
  String? nim, name, email, major, programStudy, createdAt, updatedAt;

  UserModel({
    // required this.code,
    // required this.status,
    // required this.message,
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
    var student = object['student'];

    return UserModel(
      id: object['id'],
      nim: object['nim'],
      name: object['name'],
      email: object['email'],
      major: object['major'],
      programStudy: student['study_program'],
      createdAt: object['created_at'],
      updatedAt: object['updated_at'],
    );
  }
}
