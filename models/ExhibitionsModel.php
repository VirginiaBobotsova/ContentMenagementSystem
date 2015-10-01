<?php
class ExhibitionsModel extends BaseModel {

    public function getAll() {
        $statement = self::$db->query("SELECT * FROM exhibitions");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getFilteredExhibitions($from, $size) {
        $statement = self::$db->prepare("SELECT * FROM exhibitions LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM exhibitions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function findLast() {
        $statement = self::$db->prepare(
            "SELECT * FROM exhibitions WHERE id = LAST ");
        return $statement;
    }


    public function create($name, $date, $gallery, $comment, $text, $image) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO exhibitions VALUES(NULL, ?, ?, ?, ?, ?, ?)");
        $statement->bind_param("sssssb", $name, $date, $gallery, $comment, $text, $image);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name, $date, $gallery, $comment, $text, $image) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE exhibitions SET name = ?, date = ?, gallery = ?, comment = ?, text = ?, image = ? WHERE id = ?");
        $statement->bind_param("ssssssi", $name,  $date, $gallery, $comment, $text, $image, $id);
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
