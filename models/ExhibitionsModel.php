<?php
class ExhibitionsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM exhibitions");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM exhibitions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($name, $date, $gallery, $comment, $image) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO exhibitions VALUES(NULL, ?, ?, ?, ?, ?)");
        $statement->bind_param("ssssb", $name, $date, $gallery, $comment, $image);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name, $date, $gallery, $comment, $image) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE exhibitions SET name = ?, $date = ?, $gallery, $comment, $image WHERE id = ?");
        $statement->bind_param("ssssbi", $name,  $date, $gallery, $comment, $image, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM exhibitions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
