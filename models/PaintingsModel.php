<?php
class PaintingsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM paintings");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM paintings WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($name, $image) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO paintings VALUES(NULL, ?, ?)");
        $statement->bind_param("ss", $name, $image);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name, $image) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE paintings SET name = ?, image = ? WHERE id = ?");
        $statement->bind_param("ssi", $name, $image, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM paintings WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
