<?php

declare(strict_types=1);

namespace DogCare\Client\Domain;

use DogCare\Shared\Domain\Aggregate\AggregateRoot;
use DogCare\Shared\Domain\ValueObject\CreatedAt;
use DogCare\Shared\Domain\ValueObject\DeletedAt;
use DogCare\Shared\Domain\ValueObject\UpdatedAt;
use DogCare\Shared\Domain\ValueObject\Uuid;

final class Client extends AggregateRoot
{
    public static function primitiveName(): string
    {
        return 'client';
    }

    public static function create(
        string $id,
        string $name,
        string $surname,
        string $phone,
        string $email,
    ): self {
        return new self(
            new ClientId($id),
            new ClientName($name),
            new ClientSurname($surname),
            new ClientPhone($phone),
            new ClientEmail($email),
        );
    }

    public static function fromPrimitives(array $data): Client
    {
        return new Client(
            new ClientId($data[ClientId::primitiveName()]),
            new ClientName($data[ClientName::primitiveName()]),
            new ClientSurname($data[ClientSurname::primitiveName()]),
            new ClientPhone($data[ClientPhone::primitiveName()]),
            new ClientEmail($data[ClientEmail::primitiveName()]),
            new CreatedAt($data[CreatedAt::primitiveName()]),
            isset($data[UpdatedAt::primitiveName()])
                ? new UpdatedAt($data[UpdatedAt::primitiveName()])
                : null,
            isset($data[DeletedAt::primitiveName()])
                ? new DeletedAt($data[DeletedAt::primitiveName()])
                : null,
        );
    }

    public function toPrimitives(): array
    {
        return [
            ClientId::primitiveName() => $this->id->value(),
            ClientName::primitiveName() => $this->name->value(),
            ClientSurname::primitiveName() => $this->surname->value(),
            ClientPhone::primitiveName() => $this->phone->value(),
            ClientEmail::primitiveName() => $this->email->value(),
            CreatedAt::primitiveName() => $this->createdAt->value(),
            UpdatedAt::primitiveName() => $this->updatedAt?->value(),
            DeletedAt::primitiveName() => $this->deletedAt?->value(),
        ];
    }

    public function __construct(
        private readonly ClientId $id,
        private ClientName $name,
        private ClientSurname $surname,
        private ClientPhone $phone,
        private ClientEmail $email,
        private readonly CreatedAt $createdAt = new CreatedAt(),
        private ?UpdatedAt $updatedAt = null,
        private ?DeletedAt $deletedAt = null,
    ) {
    }

    public function id(): ClientId
    {
        return $this->id;
    }

    public function name(): ClientName
    {
        return $this->name;
    }

    public function surname(): ClientSurname
    {
        return $this->surname;
    }

    public function phone(): ClientPhone
    {
        return $this->phone;
    }

    public function email(): ClientEmail
    {
        return $this->email;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?UpdatedAt
    {
        return $this->updatedAt;
    }

    public function deletedAt(): ?DeletedAt
    {
        return $this->deletedAt;
    }

    public function updateName(ClientName $name): void
    {
        if (!$this->name->equals($name)) {
            $this->name = $name;
            $this->updatedAt = new UpdatedAt();
        }
    }

    public function updateSurname(ClientSurname $surname): void
    {
        if (!$this->surname->equals($surname)) {
            $this->surname = $surname;
            $this->updatedAt = new UpdatedAt();
        }
    }

    public function updatePhone(ClientPhone $phone): void
    {
        if (!$this->phone->equals($phone)) {
            $this->phone = $phone;
            $this->updatedAt = new UpdatedAt();
        }
    }

    public function updateEmail(ClientEmail $email): void
    {
        if (!$this->email->equals($email)) {
            $this->email = $email;
            $this->updatedAt = new UpdatedAt();
        }
    }

    public function save(ClientRepository $repository): void
    {
        $repository->save($this);
    }

    public function delete(ClientRepository $repository): void
    {
        $this->deletedAt = new DeletedAt();
        $repository->save($this);
    }
}
