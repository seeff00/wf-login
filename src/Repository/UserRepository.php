<?php

namespace App\Repository;

use App\Model\User;

class UserRepository implements RepositoryInterface
{
    protected \PDO $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Retrieves user from database by ID
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(array(':id' => $id));

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves user from database by e-mail address
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(array(':email' => $email));

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves user from database by e-mail address and password
     * @param $email
     * @param $password
     * @return mixed
     */
    public function getByEmailAndPass($email, $password)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $stmt->execute(array(':email' => $email, ':password' => $password));

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves all users from database
     * @return mixed
     */
    public function getAll()
    {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Insert new user in database
     * @param $data
     * @return int
     */
    public function insert($data): int
    {
        $user = $this->getByEmail($data->getEmail());
        if (empty($user)) {
            try {
                $query = "INSERT INTO users (first_name,last_name,password,email,created_at) VALUES (?,?,?,?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute([
                    $data->getFirstName(),
                    $data->getLastName(),
                    $data->getPassword(),
                    $data->getEmail(),
                    $data->getCreatedAt()
                ]);

                return $stmt->rowCount();
            } catch (\Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return 0;
    }

    /**
     * Update existing user
     * @param User $data
     * @return int
     */
    public function update($data): int
    {
        $user = $this->getByEmail($data->getEmail());
        if ($user){
            $query = "UPDATE users SET first_name = ?, SET last_name = ?, SET password = ?, SET email = ?, SET modified_at = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $data->getFirstName(),
                $data->getLastName(),
                $data->getPassword(),
                $data->getEmail(),
                $data->getModifiedAt(),
                $data->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Deletes existing user by ID
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}