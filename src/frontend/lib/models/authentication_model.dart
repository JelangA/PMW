class AuthenticationModel {
  int? code;
  String? status, message;
  dynamic data;

  AuthenticationModel({
    required this.code,
    required this.status,
    required this.message,
    required this.data,
  });

  factory AuthenticationModel.fromJson(Map<String, dynamic> object) {
    return AuthenticationModel(
      code: object['metadata']['code'],
      status: object['metadata']['status'],
      message: object['metadata']['message'],
      data: object['data'],
    );
  }
}
